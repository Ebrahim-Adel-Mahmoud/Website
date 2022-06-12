<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Website\IndexController;
use App\Http\Controllers\Website\PostController;
use App\Http\Controllers\Website\CategoryController as WebsiteCategoryController;
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
//Route::get('/', function () {
//   return view('dashboard.layouts.layout');
//});


// website
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/categories/{category}', [WebsiteCategoryController::class, 'show'])->name('category');
Route::get('/post/{post}', [PostController::class, 'show'])->name('post');


//Dashboard
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth','CheckLogin' ]], function () {
    Route::get('/', function () {
        return view('dashboard.layouts.layout');
    });
    Route::get('/user/all', [UserController::class, 'getUserDataTable'])->name('user.all');

    Route::get('/setting',[SettingController::class,'index'])->name('setting');

    Route::post('/setting/update/{setting}', [SettingController::class, 'update'])->name('setting.update');
    Route::post('/user/delete', [UserController::class, 'delete'])->name('user.delete');

    Route::get('/category/all', [CategoryController::class, 'getCategoryDataTable'])->name('category.all');
    Route::post('/category/delete', [CategoryController::class,'delete'])->name('category.delete');

    Route::get('/posts/all', [PostsController::class, 'getPostsDatatable'])->name('posts.all');
    Route::post('/posts/delete', [PostsController::class, 'delete'])->name('posts.delete');

    Route::resources([
        'user' => UserController::class,
        'category'=>CategoryController::class,
        'posts' => PostsController::class,
    ]);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
