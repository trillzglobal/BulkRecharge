<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Tymon\JWTAuth\Exceptions\UserNotDefinedException;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function validate($data, $rules) {
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            abort(error('Unable to process your request. Please make sure the data provided are valid', $validator->errors()->toArray(), Response::HTTP_BAD_REQUEST));
        }
        return $data;
    }

    protected function authUser() {
        try {
            $user = auth()->userOrFail();
        }
        catch(UserNotDefinedException $e) {
            return error($e->getMessage(), null, Response::HTTP_UNAUTHORIZED);
        }
        return $user;
    }

    protected function getTransactionId(){
        do{
            $transaction_id = $this->uniqueID();
            $validator = Validator::make(["transaction_id"=> $transaction_id],
                        ["transaction_id"=>"unique:pre_load_stores"]);
        }while(!$validator->failed());

        return $transaction_id;
    }

    protected function uniqueID(){
        $string = uniqid("BULK-00",true);
        return \Str::upper($string);
    }


    protected function call($url, array $data = [], array $headers = []) {
        $content = array("details"=>$data);
        $hash_text = json_encode($content) . $this->app_key;
        $hash = hash('sha512', $hash_text);

        $headers = [
            'username' => $this->username,
            'password' => $this->password,
            'hash' => $hash
        ];

        return $this->api_call($url, $content, $headers);
    }

    protected function api_call($url, array $data = [], array $headers = []) {
        \Log::debug('URL: '.$url);

        try {
            $res = Http::withHeaders($headers)->post($url, $data);
            \Log::debug('Res: '.$res);
            if ($res->successful()) {
                $response = $res->json();
            }
            else {
                return 0; //Request failed!
            }
        }
        catch(ConnectionException $e) {
            return 1; //Service unavailable. Please try again later
        }
        catch(RequestException $e) {
            return 2; //Oops! Invalid request or endpoint called
        }
        return $response;
    }
}

