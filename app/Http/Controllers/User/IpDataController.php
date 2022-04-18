<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\IpTable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IpDataController extends Controller
{
    //
    public function storeIpData(Request $request){
        $inputData = Validator::make($request->all(), [
                'email'=>'required|email',
                'ip_address'=>'required'
        ]);

        if($inputData->fails())
        {
            return error($inputData->errors(),[]);
        }

        $userEmail = $request->email;
        $userIpAddress = $request->ip_address;

        $getUserId = User::where(['email'=>$userEmail])->first();
        $requestIp = IpTable::where(['ipaddress'=> $userIpAddress])->exists();

        if (!$requestIp)
        {
            $ipData = new IpTable();
            $ipData->user_id = $getUserId->id;
            $ipData->ipaddress = $userIpAddress;
            $ipData->save();
            return success('Success', $ipData);
        }
        return error('Ip address already exist.',[]);

    }
}
