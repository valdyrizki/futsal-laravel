<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::GET('/', 'HomeController@index')->name('index');
Route::GET('/lapang/{lapang}/detail', 'LapangController@detail')->name('detaillapang');


//LOGIN
Route::GET('/login', 'LoginController@index')->name('login');
Route::GET('/loginadmin', 'LoginController@indexadmin')->name('loginadmin');
Route::GET('/register', 'LoginController@register')->name('register');
Route::POST('/proseslogin', 'LoginController@proseslogin');
Route::POST('/prosesloginadmin', 'LoginController@prosesloginadmin');
Route::POST('/prosesregister', 'LoginController@prosesregister');

//LOGOUT
Route::GET('/logout', 'HomeController@logout');

//MEMBER
Route::group(['middleware' => 'member'], function () {
    //BOOKING
    Route::POST('/tambahbookingm', 'BookingController@storem');
    Route::GET('/bookingm', 'BookingController@indexm');
    Route::PUT('/bookingm/{booking}/cancel', 'BookingController@cancelm');
    Route::GET('/bookingm/{booking}/print', 'BookingController@print');
    Route::GET('/bookingm/{booking}/testimoni', 'BookingController@testimoni');
    Route::POST('/bookingm/{id}/addtestimoni', 'BookingController@addtestimoni');
});

//ADMIN
Route::group(['middleware' => 'admin'], function () {
    //LAPANG
    Route::GET('/lapang', 'LapangController@index')->name('lapang');
    Route::POST('/tambahlapang', 'LapangController@create');
    Route::GET('/lapang/{lapang}/edit', 'LapangController@edit');
    Route::PUT('/lapang/{lapang}/edit', 'LapangController@update');
    Route::DELETE('/lapang/{lapang}/hapus', 'LapangController@delete');

    //BOOKING
    Route::POST('/tambahbooking', 'BookingController@store');
    Route::GET('/booking', 'BookingController@index');
    Route::PUT('/booking/{booking}/konfirmasi', 'BookingController@konfirmasi');
    Route::PUT('/booking/{booking}/cancel', 'BookingController@cancel');
    Route::PUT('/booking/{booking}/selesai', 'BookingController@selesai');
    Route::GET('/booking/{booking}/print', 'BookingController@print');
});

//PEMILIK
Route::group(['middleware' => 'pemilik'], function () {

    //USER
    Route::GET('/user', 'UserController@index')->name('user');
    Route::POST('/tambahuser', 'UserController@store');
    Route::PUT('/user/{user}/edit', 'UserController@edit');
    Route::PUT('/user/{user}/update', 'UserController@update');
    Route::DELETE('/user/{user}/hapus', 'UserController@delete');

    //Laporan
    Route::GET('/laporan', 'LaporanController@index')->name('laporan');
    Route::POST('/printlaporan', 'LaporanController@printlaporan');
});

// $middlewares = [
//     'pemilik', 'admin'
// ];

// foreach ($middlewares as $middleware) {
//     Route::prefix($middleware)->group(function () {
//         Route::get('news', 'NewsController@index')->name('news_index');
//         Route::get('article', 'ArticleController@index')->name('article_index');
//     });
// }


