<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\NavbarController;
use App\Http\Controllers\Admin\ApiPostsController;

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

    //waiting for approval
    Route::get('approval_posts', 'PostController@approval_posts')->name('approval_posts');


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
    Route::get('/post_reject/{post_id}', [DashBoardController::class, 'post_reject'])->name('post_reject');
    Route::get('/post_accept/{post_id}', [DashBoardController::class, 'post_accept'])->name('post_accept');
    Route::get('/post_approval', [DashBoardController::class, 'post_approval'])->name('post_approval');
    Route::get('/user_approval', [DashBoardController::class, 'user_approval'])->name('user_approval');
    Route::get('/user_accept/{user_id}', [DashBoardController::class, 'user_accept'])->name('user_accept');
    Route::get('/user_reject/{user_id}', [DashBoardController::class, 'user_reject'])->name('user_reject');

    //Api Posts
    Route::get('/posts/api', [ApiPostsController::class, 'posts_api'])->name('posts_api');
    //End Api Posts

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
    Route::post('/delete_role', [DashBoardController::class, 'delete_role'])->name('delete_role');
    Route::post('/add_role', [DashBoardController::class, 'add_role'])->name('add_role');


    Route::get('/roles', [DashBoardController::class, 'roles'])->name('roles');
    Route::get('/general_setting', [SettingController::class, 'general_setting'])->name('general_setting');
    Route::get('/mini_header_setting', [DashBoardController::class, 'mini_header_setting'])->name('mini_header_setting');

    // navbar
    Route::get('/nav_setting', [NavbarController::class, 'nav_setting'])->name('nav_setting');
    Route::post('/main_header1_1', [NavbarController::class, 'main_header1_1'])->name('main_header1_1');
    Route::post('/main_header1_2', [NavbarController::class, 'main_header1_2'])->name('main_header1_2');
    Route::post('/main_header1_3', [NavbarController::class, 'main_header1_3'])->name('main_header1_3');
    Route::post('/main_header1_4', [NavbarController::class, 'main_header1_4'])->name('main_header1_4');
    Route::post('/main_header2_1', [NavbarController::class, 'main_header2_1'])->name('main_header2_1');
    Route::post('/main_header2_2', [NavbarController::class, 'main_header2_2'])->name('main_header2_2');
    Route::post('/main_header2_3', [NavbarController::class, 'main_header2_3'])->name('main_header2_3');
    Route::post('/main_header2_4', [NavbarController::class, 'main_header2_4'])->name('main_header2_4');
    Route::post('/main_header3_1', [NavbarController::class, 'main_header3_1'])->name('main_header3_1');
    Route::post('/main_header3_2', [NavbarController::class, 'main_header3_2'])->name('main_header3_2');
    Route::post('/main_header3_3', [NavbarController::class, 'main_header3_3'])->name('main_header3_3');
    Route::post('/main_header3_4', [NavbarController::class, 'main_header3_4'])->name('main_header3_4');
    //end navbar


    Route::get('/system_setting', [SettingController::class, 'system_setting'])->name('system_setting');

    Route::post('/system_name_setting', [SettingController::class, 'system_name_setting'])->name('system_name_setting');
    Route::post('/favicon_setting', [SettingController::class, 'favicon_setting'])->name('favicon_setting');
    Route::post('/front_logo_setting', [SettingController::class, 'front_logo_setting'])->name('front_logo_setting');
    Route::post('/admin_logo_setting', [SettingController::class, 'admin_logo_setting'])->name('admin_logo_setting');

    Route::post('/miniheader_setting', [SettingController::class, 'miniheader_setting'])->name('miniheader_setting');
    Route::post('/delete_source', [SettingController::class, 'delete_source'])->name('delete_source');

    //----for notification
    Route::get('/notification', [NotificationController::class, 'notification'])->name('notification');
    Route::get('/mark_unread_post/{post_id}', [NotificationController::class, 'mark_unread_post'])->name('mark_unread_post');
    Route::get('/remove_unread_post/{post_id}', [NotificationController::class, 'remove_unread_post'])->name('remove_unread_post');
    Route::get('/remove_all_unread_post/{post_id}/{user_id}', [NotificationController::class, 'remove_all_unread_post'])->name('remove_all_unread_post');

    Route::get('/mark_unread_comment/{id}', [NotificationController::class, 'mark_unread_comment'])->name('mark_unread_comment');
    Route::get('/remove_unread_comment/{id}', [NotificationController::class, 'remove_unread_comment'])->name('remove_unread_comment');
    Route::get('/remove_all_unread_comment/{id}/{user_id}', [NotificationController::class, 'remove_all_unread_comment'])->name('remove_all_unread_comment');

    Route::get('/mark_unread_user/{id}', [NotificationController::class, 'mark_unread_user'])->name('mark_unread_user');
    Route::get('/remove_unread_user/{id}', [NotificationController::class, 'remove_unread_user'])->name('remove_unread_user');
    //----end notification

    //---UserProfile
    Route::get('/user_profile', [DashBoardController::class, 'user_profile'])->name('user_profile');

});
