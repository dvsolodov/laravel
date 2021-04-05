<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;

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

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/news_catalog', [NewsCategoryController::class, 'index'])
    ->name('news::catalog');

Route::get('/category/{category}', [NewsController::class, 'categoryNews'])
    ->name('news::fromCategory');

Route::get('/category/{category}/news/{news}', [NewsController::class, 'newsCard'])
    ->name('news::card');

Route::group(
    [
        'prefix' => '/admin',
        'as' => 'admin::',
    ], 
    function () {
        Route::get('/', [AdminAuthController::class, 'index'])
            ->name('auth::form');

        Route::post('/', [AdminAuthController::class, 'auth'])
            ->name('auth');

        Route::group(
            [
                'prefix' => '/news',
                'as' => 'news::',
            ],
            function () {
                Route::get('/', [AdminNewsController::class, 'index'] )
                    ->name('index');
                Route::get('/create',[AdminNewsController::class, 'create'])
                    ->name('create');
                Route::get('/update',[AdminNewsController::class, 'update'])
                    ->name('update');
                Route::get('/delete',[AdminNewsController::class, 'delete'])
                    ->name('delete');
            }
        );

        Route::group(
            [
                'prefix' => '/category',
                'as' => 'category::',
            ],
            function () {
                Route::get('/', [AdminCategoryController::class, 'index'] )
                    ->name('index');
                Route::get('/create',[AdminCategoryController::class, 'create'])
                    ->name('create');
                Route::get('/update',[AdminCategoryController::class, 'update'])
                    ->name('update');
                Route::get('/delete',[AdminCategoryController::class, 'delete'])
                    ->name('delete');
            }
        );
    }
);

