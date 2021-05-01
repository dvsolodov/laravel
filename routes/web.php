<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\FeedbackController;

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
        'prefix' => '/feedback',
        'as' => 'feedback::',
    ], 
    function () {
        Route::get('/', [FeedbackController::class, 'show'])
            ->name('show');

        Route::post('/', [FeedbackController::class, 'createFeedback'])
            ->name('create');
    }
);

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
                Route::get('/', [AdminNewsController::class, 'showAll'])
                    ->name('show::all');
                Route::get('/show/{id}', [AdminNewsController::class, 'show'])
                    ->name('show');
                Route::get('/create',[AdminNewsController::class, 'showCreateForm'])
                    ->name('create::form');
                Route::post('/create',[AdminNewsController::class, 'create'])
                    ->name('create');
                Route::get('/edit/{id}',[AdminNewsController::class, 'showEditForm'])
                    ->name('edit::form');
                Route::post('/edit/{id}',[AdminNewsController::class, 'edit'])
                    ->name('edit');
                Route::get('/delete/{id}',[AdminNewsController::class, 'delete'])
                    ->name('delete');
            }
        );

        Route::group(
            [
                'prefix' => '/category',
                'as' => 'category::',
            ],
            function () {
                Route::get('/', [AdminCategoryController::class, 'showAll'] )
                    ->name('show::all');
                Route::get('/create',[AdminCategoryController::class, 'showCreateForm'])
                    ->name('create::form');
                Route::post('/create',[AdminCategoryController::class, 'create'])
                    ->name('create');
                Route::get('/edit/{id}',[AdminCategoryController::class, 'showEditForm'])
                    ->name('edit::form');
                Route::post('/edit/{id}',[AdminCategoryController::class, 'edit'])
                    ->name('edit');
                Route::get('/delete/{id}',[AdminCategoryController::class, 'delete'])
                    ->name('delete');
            }
        );
    }
);

