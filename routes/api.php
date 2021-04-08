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
Route::post('login', [App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('register', [App\Http\Controllers\Api\AuthController::class, 'register']);
//Route::middleware('auth:api')->get('/', [App\Http\Controllers\ChildController::class, 'index']);

Route::get('/', [App\Http\Controllers\PostController::class, 'postForHome']);

Route::prefix('/profile-user/child-diary')->group(function () {
    Route::get('/', [App\Http\Controllers\ChildController::class, 'index']);
    Route::post('/add-child', [App\Http\Controllers\ChildController::    class, 'store']);
    Route::get('/{child}', [App\Http\Controllers\ChildController::class, 'show']);
    Route::patch('/{child}', [App\Http\Controllers\ChildController::class, 'update']);
    Route::delete('/{child}', [App\Http\Controllers\ChildController::class, 'destroy']);
});

Route::prefix('/communities/{category}')->group(function () {
    Route::get('/', [App\Http\Controllers\PostController::class, 'index']);
    Route::middleware('auth:api')->post('/add/post', [App\Http\Controllers\PostController::class, 'store']);
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
Route::get('/popular/{category}', [App\Http\Controllers\CommentController::class, 'popular']);
Route::get('/count/{post}', [App\Http\Controllers\CommentController::class, 'postComments']);
Route::prefix('/communities/{category}/{post}')->group(function () {
    Route::post('/', [App\Http\Controllers\CommentController::class, 'store']);

});
Route::get('/sub/{category}', [App\Http\Controllers\CategoryController::class, 'getSubcategory']);

Route::delete('/comments/{comment}', [App\Http\Controllers\CommentController::class, 'destroy']);
Route::prefix('/consultations')->group(function () {
    Route::get('/', [App\Http\Controllers\ConsultationController::class, 'index']);
    Route::middleware('auth:api')->post('/', [App\Http\Controllers\ConsultationController::class, 'store']);
    Route::get('/{consultation}', [App\Http\Controllers\ConsultationController::class, 'show']);
    Route::delete('/{consultation}', [App\Http\Controllers\ConsultationController::class, 'destroy']);
});




Route::prefix('/profile-user/child-diary')->group(function () {
  //  Route::get('/', [App\Http\Controllers\WalkController::class, 'index']);
    Route::post('/add-notes/walk', [App\Http\Controllers\WalkController::class, 'store']);
  //  Route::delete('/{notes}', [App\Http\Controllers\WalkController::class, 'destroy']);
});
Route::prefix('/profile-user/child-diary')->group(function () {
    //  Route::get('/', [App\Http\Controllers\SleepController::class, 'index']);
    Route::post('/add-notes/sleep', [App\Http\Controllers\SleepController::class, 'store']);
    //  Route::delete('/{notes}', [App\Http\Controllers\SleepController::class, 'destroy']);
});
Route::prefix('/profile-user/child-diary')->group(function () {
    //  Route::get('/', [App\Http\Controllers\TeethController::class, 'index']);
    Route::post('/add-notes/teeth', [App\Http\Controllers\TeethController::class, 'store']);
    //  Route::delete('/{notes}', [App\Http\Controllers\TeethController::class, 'destroy']);
});
Route::prefix('/profile-user/child-diary')->group(function () {
    //  Route::get('/', [App\Http\Controllers\VaccinationController::class, 'index']);
    Route::post('/add-notes/vaccination', [App\Http\Controllers\VaccinationController::class, 'store']);
    //  Route::delete('/{notes}', [App\Http\Controllers\VaccinationController::class, 'destroy']);
});
Route::prefix('/profile-user/child-diary')->group(function () {
    //  Route::get('/', [App\Http\Controllers\HeighthController::class, 'index']);
    Route::post('/add-notes/height', [App\Http\Controllers\HeighthController::class, 'store']);
    //  Route::delete('/{notes}', [App\Http\Controllers\HeighthController::class, 'destroy']);
});
Route::prefix('/profile-user/child-diary')->group(function () {
    //  Route::get('/', [App\Http\Controllers\FeedingController::class, 'index']);
    Route::post('/add-notes/feeding', [App\Http\Controllers\FeedingController::class, 'store']);
    //  Route::delete('/{notes}', [App\Http\Controllers\FeedingController::class, 'destroy']);
});
Route::middleware('auth:api')->get('/profile-user/user-posts', [App\Http\Controllers\PostController::class, 'userPost']);
