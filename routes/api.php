<?php

use App\Http\Controllers\ApiController;
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
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */


// Posts
Route::get('/users', [ApiController::class, 'users'])->name('api.users');
Route::get('/posts/top', [ApiController::class, 'postsTop'])->name('api.posts');
Route::get('/posts/{id?}', [ApiController::class, 'postId'])->name('api.postId');
