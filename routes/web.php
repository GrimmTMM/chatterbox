<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\UserController;
use App\Models\Chatter;
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
    return redirect('login');
});

Route::get('login', [PageController::class, 'login_page']);

Route::get('register', [PageController::class, 'register_page']);

Route::post('login_action', [UserController::class, 'login']);

Route::post('register_action', [UserController::class, 'register']);

Route::get('logout', [UserController::class, 'logout']);

Route::get('home', [PageController::class, 'home']);

Route::get('profile', [PageController::class, 'profile']);

Route::get('chatters', [PageController::class, 'chatters']);

Route::post('search_category', [PageController::class, 'search_category']);

Route::get('chatters/{id}', [PageController::class, 'category_chatters']);

Route::get('write_chatter', [PageController::class, 'write_chatter']);

Route::get('edit_chatter/{id}', [PageController::class, 'edit_chatter']);

Route::post('chatter_action', [ChatterController::class, 'add_chatter']);

Route::post('edit_chatter_action', [ChatterController::class, 'edit_chatter']);

Route::get('write_category', [PageController::class, 'write_category']);

Route::get('edit_category/{id}', [PageController::class, 'edit_category']);

Route::post('category_action', [CategoryController::class, 'add_category']);

Route::post('edit_category_action', [CategoryController::class, 'edit_category']);

Route::get('chatter/{id}', [PageController::class, 'chatter']);

Route::post('write_reply', [ReplyController::class, 'add_reply']);

Route::get('delete_chatter/{id}', [ChatterController::class, 'delete_chatter']);

Route::get('delete_reply/{id}', [ReplyController::class, 'delete_reply']);

Route::get('delete_category/{id}', [CategoryController::class, 'delete_category']);

Route::get('remove_user/{id}', [UserController::class, 'remove_user']);

Route::get('category_list', [PageController::class, 'category_list']);

Route::get('user_list', [PageController::class, 'user_list']);

Route::get('change_username', [PageController::class, 'change_username']);

Route::get('change_password', [PageController::class, 'change_password']);

Route::post('change_username_action', [UserController::class, 'change_username']);

Route::post('change_password_action', [UserController::class, 'change_password']);