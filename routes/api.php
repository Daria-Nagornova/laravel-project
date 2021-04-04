<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/profile-user/child-diary')->group(function () {
    Route::get('/', [App\Http\Controllers\ChildController::class, 'index']);
    Route::post('/add-child', [App\Http\Controllers\ChildController::    class, 'store']);
    Route::get('/{child}', [App\Http\Controllers\ChildController::class, 'show']);
    Route::patch('/{child}', [App\Http\Controllers\ChildController::class, 'update']);
    Route::delete('/{child}', [App\Http\Controllers\ChildController::class, 'destroy']);
});

Route::prefix('/communities/{category}')->group(function () {
    Route::get('/', [App\Http\Controllers\PostController::class, 'index']);
    Route::post('/add/post', [App\Http\Controllers\PostController::class, 'store']);
    Route::get('/{post}', [App\Http\Controllers\PostController::class, 'show']);
    Route::patch('/{post}/update', [App\Http\Controllers\PostController::class, 'update']);
    Route::delete('/{post}', [App\Http\Controllers\PostController::class, 'destroy']);
});
Route::prefix('/communities')->group(function () {
    Route::get('/', [App\Http\Controllers\CategoryController::class, 'index']);
    Route::post('/', [App\Http\Controllers\CategoryController::class, 'store']);
    Route::patch('/{category}', [App\Http\Controllers\CategoryController::class, 'update']);
    Route::delete('/{category}', [App\Http\Controllers\CategoryController::class, 'destroy']);
});
Route::prefix('/communities/{category}/{post}')->group(function () {
    Route::post('/', [App\Http\Controllers\CommentController::class, 'store']);
    Route::delete('/{comment}', [App\Http\Controllers\PostController::class, 'destroy']);
});

