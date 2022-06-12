<?php

use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\SettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/',function (){
   return 'Hello Api';
});

Route::get('/settings',[SettingController::class,'index'])->middleware('auth:sanctum');
Route::get('/index-page-categories',[CategoriesController::class,'indexPageCategoriesWithPosts']);
Route::post('/login',[LoginController::class,'login']);
