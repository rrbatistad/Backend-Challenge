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
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('posts');
});

// Posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/import', [PostController::class, 'importPosts'])->name('posts.importPosts');
Route::get('/Posts/{id}', [PostController::class, 'edit'])->name('posts.edit');

// Users
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/import', [UserController::class, 'importUsers'])->name('users.importUsers');
Route::get('/users/{id}', [UserController::class, 'edit'])->name('users.edit');
