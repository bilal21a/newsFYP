<?php

use Illuminate\Support\Facades\Route;

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

Route::get('home1', function () {
    return view('upload');
});



Route::group(['middleware' => 'Illuminate\Auth\Middleware\Authenticate'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('single_post/{post_id}', 'HomeController@single_post')->name('single_post');
    Route::post('upload_post', 'HomeController@upload_post')->name('upload_post');

});


Auth::routes();


