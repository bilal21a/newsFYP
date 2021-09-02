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
Route::get('register1', function () {return view('register');});
Route::get('fuck', function () {return view('auth.passwords.reset');});
Route::get('contact', function () {return view('user.contact');})->name('contact');


Route::get('text', function () {return view('user.home');});
Route::get('text2', function () {return view('user.singlepage');});
Route::get('text4', function () {return view('user.allcategories');});
Route::get('text5', function () {return view('user.unicategories');});
Route::get('text6', function () {return view('user.contact');});
Route::get('text7', function () {return view('showcomment');});
Route::get('text8', function () {return view('filter');});
Route::get('text9', function () {return view('upload');});
Route::get('text10', function () {return view('yourposts');});
Route::get('profile', function () {return view('profile');});



Route::group(['middleware' => 'Illuminate\Auth\Middleware\Authenticate'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('single_post/{post_id}', 'HomeController@single_post')->name('single_post');
    Route::post('upload_post', 'HomeController@upload_post')->name('upload_post');
    Route::get('hot_news', 'CategoryController@hot_news')->name('hot_news');
    Route::get('latest_news', 'CategoryController@latest_news')->name('latest_news');
    Route::get('top_stories', 'CategoryController@top_stories')->name('top_stories');
    Route::get('all_categories', 'CategoryController@all_categories')->name('all_categories');
    Route::get('categories/{cat_id}', 'CategoryController@show_categories')->name('show_categories');

    Route::get('filter_post', 'PostController@filter_post')->name('filter_post');
    Route::get('search_post', 'PostController@search_post')->name('search_post');

    //profile
    Route::get('profile_page', 'ProfileController@profile_index')->name('profile_page');
    Route::get('profile_email_change', 'ProfileController@profile_email_change')->name('profile_email_change');
    Route::get('profile_pass_change', 'ProfileController@profile_pass_change')->name('profile_pass_change');
    Route::post('profile_image_change', 'ProfileController@profile_image_change')->name('profile_image_change');
    Route::post('profile_name_change', 'ProfileController@profile_name_change')->name('profile_name_change');

    //by date
    Route::get('by_date/{created_at}', 'PostController@by_date')->name('by_date');
    //by author name
    Route::get('author_name/{user_id}', 'PostController@author_name')->name('author_name');
    //by publish posts
    Route::get('publish_posts', 'PostController@publish_posts')->name('publish_posts');
    //by save posts
    Route::get('saved_posts', 'PostController@saved_posts')->name('saved_posts');
    Route::post('saved_posts_fetch', 'PostController@saved_posts_fetch')->name('saved_posts_fetch');

    //comment
    Route::post('/comment/store', 'CommentController@store')->name('comment.add');
    // Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');
    Route::get('/your_comments', 'CommentController@your_comments')->name('your_comments');

});


Auth::routes();
Route::get('logout', 'AuthController@logout')->name('logout');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
