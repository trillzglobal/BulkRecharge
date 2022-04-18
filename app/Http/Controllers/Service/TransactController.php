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
        $upload->status = "started";
        $upload->save();
        //Check if there is any transaction to treat, if not change status and exit
        if($upload->accepted_count < 1){
            $upload->status = "treated";
            return failed('No transaction to treat', []);
        }
        $user = User::where('id', $upload->id);
        $transactions  = $upload->pre_load_stores;

        $url = config('api.base_url');
         //Check Estimated time to be within script running time

        foreach($transactions as $transaction){
            $mno_details = $transaction->m_n_o_s;
            $data_package = $transaction->data_packages;

            $api_data = [
                        "ref"=>$transaction->trasaction_id,
                        "amount"=>$data_package->code,
                        "network_id"=>$mno_details->type,
                        "type"=>$transaction->type,
                        "account"=>$transaction->msisdn
            ];

            $response = $this->call($url . 'vend/', $api_data);
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
