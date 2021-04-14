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
Route::get('logs','LogsController@logs');
Route::get('ssss',function(){
    return 'sssasasas';
});
Route::get('/fingerprint/list','LogsController@logs_fingerprint');

Route::get('/jailguard/fingerprint/{fingerprint}','LogsController@fingerprint_in');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
