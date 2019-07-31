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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/indexapi', 'ApiController@indexapi');
Route::post('/loginapi', 'ApiController@loginapi');

Route::post('/registerapi', 'ApiController@registerapi');

Route::get('/historybooking', 'ApiController@historybooking');

Route::post('/addbookingapi', 'ApiController@addbookingapi');

Route::get('/listlapang', 'ApiController@listlapang');
