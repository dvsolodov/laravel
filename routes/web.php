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

Route::get('/', function () {
    return 'Это домашняя страница';
});

Route::get('/home', function () {
    return 'Это домашняя страница';
});

Route::get('/about', function () {
    return 'Это страница с информацией о нас';
});

Route::get('/news', function () {
    return 'Это страница с новостями';
});

