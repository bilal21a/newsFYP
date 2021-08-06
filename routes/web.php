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

Route::get('upload', function () {return view('upload');});
Route::get('contact_us', function () {return view('user.contact');})->name('contact_us');


Route::get('text', function () {return view('categories');});
Route::get('text2', function () {return view('bydate');});



Route::group(['middleware' => 'Illuminate\Auth\Middleware\Authenticate'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('single_post/{post_id}', 'HomeController@single_post')->name('single_post');
    Route::post('upload_post', 'HomeController@upload_post')->name('upload_post');
    Route::get('categories/{cat_id}', 'CategoryController@show_categories')->name('show_categories');

});


Auth::routes();


