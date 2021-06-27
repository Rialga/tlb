<?php

use Illuminate\Http\Request;

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


Route::get('supplier/{supplier}', '\App\Http\Controllers\Api\ApiController@getMaterialViaSupplier');
Route::get('pemesanan/{pemesanan}', '\App\Http\Controllers\Api\ApiController@getPemesanan');
Route::get('bahan_baku/{bahan_baku}', '\App\Http\Controllers\Api\ApiController@getMaterial');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
