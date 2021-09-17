<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\SettingController;

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




Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'Illuminate\Auth\Middleware\Authenticate'], function () {
    Route::get('single_post/{post_id}', 'HomeController@single_post')->name('single_post');
    Route::get('upload', function () {return view('upload');});
    Route::post('upload_post', 'HomeController@upload_post')->name('upload_post');
    Route::get('hot_news', 'CategoryController@hot_news')->name('hot_news');
    Route::get('latest_news', 'CategoryController@latest_news')->name('latest_news');
    Route::get('top_stories', 'CategoryController@top_stories')->name('top_stories');
    Route::get('all_categories', 'CategoryController@all_categories')->name('all_categories');
    Route::get('categories/{cat_id}', 'CategoryController@show_categories')->name('show_categories');

    Route::get('filter_post', 'PostController@filter_post')->name('filter_post');
    Route::get('search_post', 'PostController@search_post')->name('search_post');

    //profile
    // Route::get('profile', function () {return view('profile');});
    Route::get('profile', 'ProfileController@view')->name('profile');
    Route::get('profile_page', 'ProfileController@profile_index')->name('profile_page');
    Route::get('profile_email_change', 'ProfileController@profile_email_change')->name('profile_email_change');
    Route::get('profile_pass_change', 'ProfileController@profile_pass_change')->name('profile_pass_change');
    Route::post('profile_image_change', 'ProfileController@profile_image_change')->name('profile_image_change');
    Route::post('profile_name_change', 'ProfileController@profile_name_change')->name('profile_name_change');

    //by date
    Route::get('by_date/{created_at}', 'PostController@by_date')->name('by_date');
    //by author name
    Route::get('author_name/{user_id}', 'PostController@author_name')->name('author_name');
    Route::get('author_name_api/{name}', 'PostController@author_name_api')->name('author_name_api');
    //by publish posts
    Route::get('publish_posts', 'PostController@publish_posts')->name('publish_posts');
    //by save posts
    Route::get('saved_posts', 'PostController@saved_posts')->name('saved_posts');
    Route::post('saved_posts_fetch', 'PostController@saved_posts_fetch')->name('saved_posts_fetch');
    Route::post('saved_posts_delete', 'PostController@saved_posts_delete')->name('saved_posts_delete');
    Route::post('saved_posts_publish', 'PostController@saved_posts_publish')->name('saved_posts_publish');

    //comment
    Route::post('/comment/store', 'CommentController@store')->name('comment.add');
    // Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');
    Route::get('/your_comments', 'CommentController@your_comments')->name('your_comments');

    Route::get('api_source/{source}', 'ApiController@api_source')->name('api_source');

    Route::get('testing', 'TestController@testing')->name('testing');
    Route::get('ORM', 'TestController@learnORM')->name('ORM');

    Route::post('/search', 'HomeController@search')->name('search');




});
Auth::routes();
Route::get('user_logout', 'UserAuthController@logout')->name('logout');

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/clear_cache', function() {
    $run = Artisan::call('config:clear');
    $run = Artisan::call('cache:clear');
    $run = Artisan::call('config:cache');
    // return 'FINISHED';
});

//---------------------------------------------//
Route::prefix('admin')->name('admin.')->group(function () {


    Route::middleware(['guest:admin'])->group(function () {
        Route::view('/login', 'auth.admin.adminlogin')->name('login');
        Route::post('/login', [AuthController::class, 'store']);

    });


    Route::middleware(['auth:admin'])->group(function () {
        Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
        Route::view('/home', 'admin.home')->name('home');

    });

    Route::view('/index', 'admin.home')->name('index');

    Route::get('/home', [DashBoardController::class, 'home'])->name('home');
    Route::get('/users', [DashBoardController::class, 'users'])->name('users');
    Route::get('/posts', [DashBoardController::class, 'posts'])->name('posts');
    Route::get('/categories', [DashBoardController::class, 'categories'])->name('categories');
    Route::get('/rolespermission', [DashBoardController::class, 'rolespermission'])->name('rolespermission');
    Route::get('/permission', [DashBoardController::class, 'permission'])->name('permission');
    Route::get('/post_approval', [DashBoardController::class, 'post_approval'])->name('post_approval');
    Route::get('/user_approval', [DashBoardController::class, 'user_approval'])->name('user_approval');


    Route::post('/edit_users', [DashBoardController::class, 'edit_users'])->name('edit_users');
    Route::post('/delete_users', [DashBoardController::class, 'delete_users'])->name('delete_users');

    Route::post('/edit_posts', [DashBoardController::class, 'edit_posts'])->name('edit_posts');
    Route::get('/delete_posts/{id}', [DashBoardController::class, 'delete_posts'])->name('delete_posts');

    Route::post('/edit_cat', [DashBoardController::class, 'edit_cat'])->name('edit_cat');
    Route::post('/delete_cat', [DashBoardController::class, 'delete_cat'])->name('delete_cat');
    Route::post('/add_cat', [DashBoardController::class, 'add_cat'])->name('add_cat');

    Route::post('/edit_perm', [DashBoardController::class, 'edit_perm'])->name('edit_perm');
    Route::post('/delete_perm', [DashBoardController::class, 'delete_perm'])->name('delete_perm');
    Route::post('/add_perm', [DashBoardController::class, 'add_perm'])->name('add_perm');

    Route::post('/edit_role', [DashBoardController::class, 'edit_role'])->name('edit_role');


    Route::get('/roles', [DashBoardController::class, 'roles'])->name('roles');
    Route::get('/general_setting', [DashBoardController::class, 'general_setting'])->name('general_setting');
    Route::get('/nav_setting', [DashBoardController::class, 'nav_setting'])->name('nav_setting');
    Route::get('/notification', [DashBoardController::class, 'notification'])->name('notification');


    Route::post('/system_setting', [SettingController::class, 'system_setting'])->name('system_setting');



});
