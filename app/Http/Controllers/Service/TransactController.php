<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\{
    UploadRequest,
    User
    };
use Illuminate\Http\Request;

class TransactController extends Controller
{
    //

    public function CronTransact(){

        //Select reference that is not treated
        $upload = UploadRequest::where("status","pending")->lockForUpdate()->first();
        if(empty($upload))
        {
            return success("No Transaction to be treated.", []);
        }
        $upload->status = "started";
        $upload->save();
//        dd($upload);
        //Check if there is any transaction to treat, if not change status and exit
        if($upload->accepted_count < 1){
            $upload->status = "treated";
            return failed('No transaction to treat', []);
        }
        $user = User::where('id', $upload->id);
        $transactions  = $upload->pre_load_stores;
//        dd($upload,$transactions);
        $url = config('api.base_url');
         //Check Estimated time to be within script running time

        foreach($transactions as $transaction){
            $mno_details = $transaction->m_n_o_s;
            $data_package = $transaction->data_packages;
//            dd($mno_details,$data_package);
            $api_data = [
                        "ref"=>$transaction->transaction_id,
                        "amount"=>$data_package->code,
                        "networkid"=>$mno_details->type,
                        "type"=>$transaction->type,
                        "account"=>$transaction->msisdn
            ];

            $response = $this->call(config("api.airvend_base_url") . 'vend/', $api_data);
            dd($response);
            if(is_numeric($response) || $response["confirmationCode"] != 200){
                //Failed
            }
        }


        $return = UploadRequest::where('id',$upload->id)
                                ->with('pre_load_stores.data_packages',
                                    'pre_load_stores.m_n_o_s',
                                    'users')
                                ->get();

        //Perform transaction





        //Store success and failed
        //Send Response through webhook
    }

    public function queryTransaction($reference){

        $return = UploadRequest::where('reference',$reference)
                                ->with('pre_load_stores.data_packages',
                                    'pre_load_stores.m_n_o_s',
                                    'users')
                                ->get();
        if(empty($result)){
            return failed("Transaction does not exist", []);
        }

        return success("Transaction fetched successfully", $return);
    }
}
