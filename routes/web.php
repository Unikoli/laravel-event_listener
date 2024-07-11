<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('register',[UserController::class,'register_index']);
Route::post('register',[UserController::class,'register_store']);

Route::get('login',[UserController::class,'login_index']);
Route::post('login',[UserController::class,'authenticate']);

Route::get('posts',[PostController::class,'post_index']);
Route::get('postAdd',[PostController::class,'post_create']);
Route::post('postAdd',[PostController::class,'post_store']);


