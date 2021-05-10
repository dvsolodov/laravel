<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\ParserController as AdminParserController;
use App\Http\Controllers\Admin\SourceController as AdminSourceController;
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
   ['middleware' => 'guest'], 
    function () {
        Route::get('/register', [RegisterController::class, 'showRegisterForm'])
            ->name('register::form');

        Route::post('/register', [RegisterController::class, 'register'])
            ->name('register');

        Route::get('/login', [LoginController::class, 'showLoginForm'])
            ->name('login::form');

        Route::post('/login', [LoginController::class, 'login'])
            ->name('login');

        Route::get('/auth/vk', [LoginController::class, 'loginVk'])
            ->name('vk::login');

        Route::get('/auth/vk/response', [LoginController::class, 'responseVk'])
            ->name('vk::response');
    }
);

Route::group(
   ['middleware' => 'auth'], 
    function () {
        Route::get('/logout', [LoginController::class, 'logout'])
            ->name('logout');

        Route::get('/profile', [ProfileController::class, 'showProfileForm'])
            ->name('profile::form');

        Route::post('/profile/edit', [ProfileController::class, 'edit'])
            ->name('profile::edit');
    }
);

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

        Route::get('/logout', [AdminAuthController::class, 'logout'])
            ->name('logout');
});

Route::group(
    [
        'prefix' => '/admin',
        'as' => 'admin::',
        'middleware' => ['auth', 'admin'],
    ], 
    function () {
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
                'prefix' => '/source',
                'as' => 'source::',
            ],
            function () {
                Route::get('/add', [AdminSourceController::class, 'index'])
                    ->name('add::form');
                Route::post('/add', [AdminSourceController::class, 'store'])
                    ->name('add');
            }
        );

        Route::get('/parse', [AdminParserController::class, 'parseAll'])
            ->name('parse::all');

        Route::group(
            [
                'prefix' => '/category',
                'as' => 'category::',
            ],
            function () {
                Route::get('/', [AdminCategoryController::class, 'showAll'])
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

