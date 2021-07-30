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
// Route::get('/', function () {
//     return view('single-page');
// });
// Route::get('home1', function () {
//     return view('index');
// });
// Route::get('contact', function () {
//     return view('contact');
// });
// Route::get('single', function () {
//     return view('single-page');
// });
Route::group(['middleware' => 'Illuminate\Auth\Middleware\Authenticate'], function () {
    Route::get('/index', 'HomeController@index')->name('home');
});

Auth::routes();


