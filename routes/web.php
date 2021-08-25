<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('text2', function () {return view('user.singlepage');});
Route::get('text3', function () {return view('user.single2');});
Route::get('text4', function () {return view('user.allcategories');});
Route::get('text5', function () {return view('user.unicategories');});
Route::get('text6', function () {return view('user.contact');});
Route::get('text7', function () {return view('showcomment');});
Route::get('text8', function () {return view('filter');});
Route::get('text9', function () {return view('profile');});



Route::group(['middleware' => 'Illuminate\Auth\Middleware\Authenticate'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('single_post/{post_id}', 'HomeController@single_post')->name('single_post');
    Route::post('upload_post', 'HomeController@upload_post')->name('upload_post');
    Route::get('categories/{cat_id}', 'CategoryController@show_categories')->name('show_categories');

});


Auth::routes();


