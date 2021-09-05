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

Route::prefix('open/info/')->group(function () {
    Route::post('store', 'HookApi\OpenInfoController@store');
    Route::put('update', 'HookApi\OpenInfoController@update');
    Route::get('/', 'HookApi\OpenInfoController@index');
    Route::delete('/', 'HookApi\OpenInfoController@destroy');
});
Route::post('open/table/store', 'HookApi\OpenTableController@store');
Route::put('open/table/{id}/update', 'HookApi\OpenTableController@update');
Route::delete('open/table/{id}', 'HookApi\OpenTableController@destroy');
Route::get('open/table', 'HookApi\OpenTableController@index');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
