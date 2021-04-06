<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;

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

/*Route::get('/home', function () {
    return view('home');
});
Route::get('/', function () {
    return view('index');
});
Route::get('/db', function () {
$category = Category::first();
    dd($category->subcategories());
});
Route::view('/blog', 'pages.blog');
Route::get('/users', 'App\Http\Controllers\UserController@index');
Route::get('/callback', function () {
    dump('Возврат результата работы callback function');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/consultation/{specialization}', function ($specialization) {
    dump('Специализация - '.$specialization);
});
Route::get('/community/{topic?}', function ($topic='pregnancy') {
    dump('Сообщество - '.$topic);
});

*/

Auth::routes();

Route::get('/{any}', [App\Http\Controllers\HomeController::class, 'index'])->where('any', '.*');

