<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\{
    PreLoadAirtimeStore,
    PreLoadStore,
    UploadRequest,
    User
};
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactController extends Controller
{
    //

    public function CronTransact()
    {

        //Select reference that is not treated
        $upload = UploadRequest::where("status", "pending")->lockForUpdate()->first();
        if (empty($upload)) {
            return success("No Transaction to be treated.", []);
        }
        $upload->status = "started";
        $upload->save();
        //        dd($upload);


        //Check if there is any transaction to treat, if not change status and exit
        if ($upload->accepted_count < 1) {
            $upload->status = "treated";
            return failed('No transaction to treat', []);
        }
        $user = User::where('id', $upload->id);
        $transactions  = $upload->pre_load_stores;

        //Check Estimated time to be within script running time
        $failed_count = 0;
        $success_count = 0;
        $total_amount_failed = 0;
        $total_amount_success = 0;

        $start_time = microtime(true);
        foreach ($transactions as $transaction) {
            $mno_details = $transaction->m_n_o_s;
            $data_package = $transaction->data_packages;
            //            dd($mno_details,$data_package);
            $api_data = [
                "ref" => $transaction->transaction_id,
                "amount" => $data_package->code,
                "networkid" => $mno_details->type,
                "type" => $transaction->type,
                "account" => $transaction->msisdn
            ];

            $response = $this->call(config("api.airvend_base_url") . 'vend/', $api_data);

            if (is_numeric($response) || $response["confirmationCode"] != 200) {
                $transaction->status = "failed";
                $failed_count++;
                $total_amount_failed += $data_package->amount;
            } else {
                $transaction->status = "success";
                $success_count++;
                $total_amount_success += $data_package->amount;
            }

            $transaction->save();
        }
        $stop_time = microtime(true);

        $upload->status = "treated";
        $upload->failed_count = $failed_count;
        $upload->total_amount_failed = $total_amount_failed;
        $upload->success_count = $success_count;
        $upload->total_amount_success = $total_amount_success;
        $upload->actual_time = $stop_time - $start_time;
        $upload->save();

        $return = UploadRequest::where('id', $upload->id)
            ->with(
                'pre_load_stores.data_packages',
                'pre_load_stores.m_n_o_s',
                'users'
            )
            ->get();

        // dd($user);

        $sent_status =  $this->api_call($upload->users->webhook, $return->toArray());
        //{"status":"success", "responseCode":200}

        if (!is_numeric($sent_status)) {
        }

        return success("Transaction completed.", $return);
    }

    public function getStatistics()
    {
        $user_id =  $this->authUser()->id;
        // $data = PreLoadStore::select('*')->whereMonth('created_at', Carbon::now()->month)->count();
        $data = PreLoadStore::select('*')
            // ->where([''])
            ->where('created_at', '>=', now()->firstOfMonth())
            ->where('created_at', '<', now()->lastOfMonth())
            ->count();
        // $airtime = PreLoadAirtimeStore::select('*')->whereMonth('created_at', Carbon::now()->month)->count();
        $airtime = PreLoadAirtimeStore::select('*')
            ->where('created_at', '>=', now()->firstOfMonth())
            ->where('created_at', '<', now()->lastOfMonth())
            ->count();
        $totalSuccessfulData = PreLoadStore::select('*')->where('status', 'successful')->whereMonth('created_at', Carbon::now()->month)->sum('amount');
        $totalSuccessfulAirtime = PreLoadAirtimeStore::select('*')->where('status', 'successful')->whereMonth('created_at', Carbon::now()->month)->sum('amount');

        return success("Statistics fetched successfully", ["data" => $data, "airtime" => $airtime, "total_sum_data" => $totalSuccessfulData, "total_sum_airtime" => $totalSuccessfulAirtime]);
    }

    public function queryTransaction($reference)
    {
        $type = UploadRequest::select('type', 'id')->where('reference', $reference)->first();
        
        if ($type->type == '2') {

            $return = PreLoadStore::where('upload_request_id', $type->id)->with('m_n_o_s', 'data_packages')->get();
            // $return = UploadRequest::where('reference', $reference)
            //     ->with(
            //         'pre_load_stores.data_packages',
            //         'pre_load_stores.m_n_o_s',
            //         'users'
            //     )
            //     ->get();
        }

        if ($type->type == '1') {
            $return = PreLoadAirtimeStore::where('upload_request_id', $type->id)->with('m_n_o_s')->get();
            // $return = UploadRequest::where('reference', $reference)
            //     ->with(
            //         'pre_load_airtime_stores.m_n_o_s',
            //         'users'
            //     )
            //     ->get();
        }


        if (empty($return)) {
            return failed("Transaction does not exist", []);
        }

        return success("Transaction fetched successfully", $return);
    }

    public function getTransactions()
    {
        $return = UploadRequest::orderBy('created_at', 'DESC')->paginate(50);

        if (empty($return)) {
            return failed("Transaction does not exist", []);
        }

        return success("Transaction fetched successfully", $return);
    }
}
