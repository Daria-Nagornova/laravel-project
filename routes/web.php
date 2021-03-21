<?php

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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('index');
});
Route::get('/blog', function () {
    return view('pages.blog');
});
Route::get('/users', function () {
    return view('pages.users');
});
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


