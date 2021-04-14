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


/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::middleware('auth:api')->get('/profile-user', function (Request $request) {
    return $request->user();
});
Route::post('login', [App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('register', [App\Http\Controllers\Api\AuthController::class, 'register']);
//Route::middleware('auth:api')->get('/', [App\Http\Controllers\ChildController::class, 'index']);

Route::get('/', [App\Http\Controllers\PostController::class, 'postForHome']);

Route::prefix('/profile-user/child-diary')->group(function () {
    Route::get('/', [App\Http\Controllers\ChildController::class, 'index']);
    Route::middleware('auth:api')->post('/add-child', [App\Http\Controllers\ChildController::class, 'store']);
    Route::get('/{child}', [App\Http\Controllers\ChildController::class, 'show']);
    Route::patch('/{child}', [App\Http\Controllers\ChildController::class, 'update']);
    Route::delete('/{child}', [App\Http\Controllers\ChildController::class, 'destroy']);
});

Route::prefix('/communities/{category}')->group(function () {
    Route::get('/', [App\Http\Controllers\PostController::class, 'index']);
    Route::middleware('auth:api')->post('/add/post', [App\Http\Controllers\PostController::class, 'store']);
    Route::get('/{post}', [App\Http\Controllers\PostController::class, 'show']);
    Route::middleware('auth:api')->post('/{post}/update', [App\Http\Controllers\PostController::class, 'update']);
    Route::delete('/{post}', [App\Http\Controllers\PostController::class, 'destroy']);
});
Route::prefix('/communities')->group(function () {
    Route::get('/', [App\Http\Controllers\CategoryController::class, 'index']);
});
Route::group(['middleware' => 'admin'], function () {
    Route::prefix('/admin/communities')->group(function () {
        Route::middleware('auth:api')->get('/', [App\Http\Controllers\CategoryController::class, 'index']);
        Route::middleware('auth:api')->post('/', [App\Http\Controllers\CategoryController::class, 'store']);
        Route::middleware('auth:api')->delete('/{category}', [App\Http\Controllers\CategoryController::class, 'destroy']);
    });
    Route::prefix('/admin/subcategories')->group(function () {
        Route::middleware('auth:api')->get('/', [App\Http\Controllers\SubcategoryController::class, 'index']);
        Route::middleware('auth:api')->post('/', [App\Http\Controllers\SubcategoryController::class, 'store']);
        Route::middleware('auth:api')->delete('/{subcategory}', [App\Http\Controllers\SubcategoryController::class, 'destroy']);
    });
    Route::prefix('/admin/doctors')->group(function () {
        Route::middleware('auth:api')->get('/', [App\Http\Controllers\DoctorController::class, 'index']);
        Route::middleware('auth:api')->post('/', [App\Http\Controllers\DoctorController::class, 'store']);
        Route::middleware('auth:api')->delete('/{doctor}', [App\Http\Controllers\DoctorController::class, 'destroy']);
    });
});

Route::get('/popular/{category}', [App\Http\Controllers\CommentController::class, 'popular']);
Route::get('/count/{post}', [App\Http\Controllers\CommentController::class, 'postComments']);
Route::middleware('auth:api')->post('/communities/{category}/{post}', [App\Http\Controllers\CommentController::class, 'store']);

Route::get('/sub/{category}', [App\Http\Controllers\CategoryController::class, 'getSubcategory']);

Route::delete('/comments/{comment}', [App\Http\Controllers\CommentController::class, 'destroy']);
Route::prefix('/consultations')->group(function () {
    Route::get('/', [App\Http\Controllers\ConsultationController::class, 'index']);
    Route::middleware('auth:api')->post('/', [App\Http\Controllers\ConsultationController::class, 'store']);
    Route::get('/{consultation}', [App\Http\Controllers\ConsultationController::class, 'show']);
    Route::delete('/{consultation}', [App\Http\Controllers\ConsultationController::class, 'destroy']);
});

Route::post('/walk', [App\Http\Controllers\WalkController::class, 'store']);
Route::delete('/delete-walk/{walk}', [App\Http\Controllers\WalkController::class, 'destroy']);
Route::post('/feeding', [App\Http\Controllers\FeedingController::class, 'store']);
Route::delete('/delete-feeding/{feeding}', [App\Http\Controllers\FeedingController::class, 'destroy']);
Route::post('/sleep', [App\Http\Controllers\SleepController::class, 'store']);
Route::delete('/delete-sleep/{sleep}', [App\Http\Controllers\SleepController::class, 'destroy']);
Route::post('/teeth', [App\Http\Controllers\TeethController::class, 'store']);
Route::delete('/delete-teeth/{teeth}', [App\Http\Controllers\TeethController::class, 'destroy']);
Route::post('/vaccination', [App\Http\Controllers\VaccinationController::class, 'store']);
Route::delete('/delete-vaccination/{vaccination}', [App\Http\Controllers\VaccinationController::class, 'destroy']);
Route::post('/height', [App\Http\Controllers\HeighthController::class, 'store']);
Route::delete('/delete-height/{height}', [App\Http\Controllers\HeighthController::class, 'destroy']);


Route::middleware('auth:api')->get('/profile-user/user-posts', [App\Http\Controllers\PostController::class, 'userPost']);
Route::middleware('auth:api')->get('/user', [App\Http\Controllers\UserController::class, 'getUser']);
Route::delete('/image/{postId}', [App\Http\Controllers\ImageController::class, 'destroy']);
Route::get('/doctors', [App\Http\Controllers\DoctorController::class, 'index']);
Route::middleware('auth:api')->get('/user-consultations', [App\Http\Controllers\ConsultationController::class, 'userConsultation']);

Route::group(['middleware' => 'doctor'], function () {
    Route::middleware('auth:api')->get('/doctor-consultations', [App\Http\Controllers\ConsultationController::class, 'doctorConsultation']);
    Route::middleware('auth:api')->post('/add-answer', [App\Http\Controllers\AnswerController::class, 'store']);
    Route::middleware('auth:api')->patch('/update-consultation/{consultation}', [App\Http\Controllers\ConsultationController::class, 'update']);
});

Route::get('/answer', [App\Http\Controllers\AnswerController::class, 'index']);
Route::middleware('auth:api')->get('/child', [App\Http\Controllers\ChildController::class, 'getChild']);
Route::get('/notes/{child}', [App\Http\Controllers\ChildController::class, 'getNotes']);
