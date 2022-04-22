<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix'=>'bulkrecharge/v1'],function($router){

    Route::group(['middleware'=>['auth:api', 'ipCheck']], function($router){
        Route::get('sample/upload',);
        Route::post('upload/data',"\App\Http\Controllers\Service\VendController@uploadData");
        Route::get('query/{reference}',"\App\Http\Controllers\Service\TransactionController@queryTransaction");
        Route::post('upload/airtime',"\App\Http\Controllers\Service\VendController@uploadAirtime");
    });
    Route::post('create/ipaddress',"\App\Http\Controllers\User\IpDataController@storeIpData");
    Route::post('register',"\App\Http\Controllers\User\RegistrationController@register");
    Route::post('access/token', "\App\Http\Controllers\User\UserController@login");
    Route::get('cron/request', '\App\Http\Controllers\Service\TransactController@CronTransact');
    
    Route::group(['middleware'=>['auth:api']], function($router){
        Route::get("statistics", "\App\Http\Controllers\Service\TransactionController@getStatistics");
        Route::get("transactions", "\App\Http\Controllers\Service\TransactionController@getTransactions");
        Route::get("transaction/{reference}", "\App\Http\Controllers\Service\TransactionController@queryTransaction");
    });
    Route::post('download/data_package', '\App\Http\Controllers\Service\VendController@get_data_package');
    Route::post('download/sample_data', '\App\Http\Controllers\Service\VendController@get_sample_data');
});
