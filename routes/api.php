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

Route::post('open/info/store', 'HookApi/OpenInfoController@store');
Route::put('open/info/update', 'HookApi/OpenInfoController@update');
Route::post('open/table/store', 'HookApi/OpenTableController@store');
Route::post('open/table/update', 'HookApi/OpenTableController@update');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
