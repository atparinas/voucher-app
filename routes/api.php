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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('test', 'API\TestController@index');

//Route::resource('users.vouchers', 'API\User\UserVoucherController', ['only' => ['index', 'store', 'destroy']]);


Route::get('users/vouchers', 'API\User\UserVoucherController@index');
Route::post('users/vouchers', 'API\User\UserVoucherController@store');
Route::delete('users/vouchers/{voucher}', 'API\User\UserVoucherController@destroy');

Route::get('users', 'API\User\UserController@index');
Route::get('users/downloads', 'API\User\UserController@download');
