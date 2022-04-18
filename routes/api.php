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

    Route::group(['middleware'=>'auth:api'], function($router){
        Route::get('sample/upload',);
        Route::post('upload/data',"\App\Http\Controllers\Service\VendController@uploadData");
        Route::get('query/{reference}',"\App\Http\Controllers\Service\TransactionController@queryTransaction");
    });
    Route::post('register',"\App\Http\Controllers\User\RegistrationController@register");
    Route::post('access/token', "\App\Http\Controllers\User\UserController@login");
    Route::get('cron/request', '\App|Http|Controllers\Service\TransactController@CronTransact');
});
