<?php

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

use App\Http\Controllers\AObjectController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RulePageController;
use App\Http\Controllers\ShopCategoryController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

// Authentication Routes...
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes...
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Password Reset Routes...
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/upload-image', [UploadController::class, 'upload']);

Route::get('home/{any}', [HomeController::class, 'index'])->where('any', '.*');

/**
 * Роуты для навигации по сайту
 */
Route::get('/', [PageController::class, 'showIndexPage'])->name('showIndexPage');
Route::get('/test', [PageController::class, 'showIndexTestPage'])->name('showIndexTestPage');
Route::get('/objects', [PageController::class, 'showObjectsListPage'])->name('showObjectsListPage');
Route::get('/object/{object}', [PageController::class, 'showObjectPage'])->name('showObjectPage');
Route::get('/blog', [PageController::class, 'showArticlesListPage'])->name('showArticlesListPage');
Route::get('/blog/{article}', [PageController::class, 'showArticlePage'])->name('showArticlePage');
Route::get('/price', [PageController::class, 'showPricePage'])->name('showPricePage');
Route::get('/contacts', [PageController::class, 'showContactPage'])->name('showContactPage');
Route::get('/internet-magazin', [PageController::class, 'showShopHeadPage'])->name('showShopHeadPage');
Route::get('/internet-magazin/goods/{item}', [PageController::class, 'showItemPage'])->name('showItemPage');
Route::get('/internet-magazin/{any}', [PageController::class, 'showCategoryPage'])->name('showCategoryPage')->where('any', '.*');
Route::get('/cart', [PageController::class, 'showCart'])->name('showCart');
Route::get('/basket', [PageController::class, 'showCart'])->name('showBasket');
Route::get('/thanks', [PageController::class, 'showThanks'])->name('showThanks');
Route::get('/video', [PageController::class, 'showVideo'])->name('showVideo');
Route::get('/rules/policy', [PageController::class, 'showPolicyPage'])->name('showPolicyPage');
Route::get('/rules/personal-data', [PageController::class, 'showPersonalDataPage'])->name('showPersonalDataPage');

/**
 * Роуты для API
 */
Route::prefix('api')->group(function () {
    Route::post('/send-mail', [ApiController::class, 'sendMessage']);
    Route::post('/send-meeting', [ApiController::class, 'sendMeeting']);
    Route::post('/send-cart', [CartController::class, 'sendCart']);

    Route::prefix('items')->group(function () {
        Route::get('/', [ItemController::class, 'loadAllItems']);
        Route::get('/{id}', [ItemController::class, 'getItemById']);
        Route::post('/save', [ItemController::class, 'saveItem']);
        Route::post('/new', [ItemController::class, 'addNewItem']);
        Route::delete('/{id}', [ItemController::class, 'deleteItem']);
    });

    Route::prefix('categories')->group(function () {
        Route::get('/', [ShopCategoryController::class, 'getAllCategory']);
        Route::get('/{id}', [ShopCategoryController::class, 'loadSingleCat']);
        Route::post('/new', [ShopCategoryController::class, 'addNewCat']);
        Route::post('/update', [ShopCategoryController::class, 'updateCat']);
        Route::delete('/{id}', [ShopCategoryController::class, 'deleteCategory']);
    });

    Route::prefix('articles')->group(function () {
        Route::get('/', [ArticleController::class, 'loadArticlesForApi']);
        Route::get('/{id}', [ArticleController::class, 'loadSingleArt']);
        Route::post('/new', [ArticleController::class, 'saveNewArt']);
        Route::post('/update', [ArticleController::class, 'updateArticle']);
        Route::delete('/{id}', [ArticleController::class, 'deleteArt']);
    });

    Route::prefix('objects')->group(function () {
        Route::get('/', [AObjectController::class, 'getAllObjects']);
        Route::get('/{id}', [AObjectController::class, 'loadSingleObj']);
        Route::post('/new', [AObjectController::class, 'addNewObject']);
        Route::post('/update', [AObjectController::class, 'updateObj']);
        Route::delete('/{id}', [AObjectController::class, 'deleteObj']);
    });

    Route::get('/notices', [NoticeController::class, 'getNotice']);
    Route::prefix('rule-pages')->group(function () {
        Route::get('/', [RulePageController::class, 'getAll']);
        Route::get('/{slug}', [RulePageController::class, 'getBySlug']);
        Route::post('/save', [RulePageController::class, 'save']);
    });

    Route::prefix('media')->group(function () {
        Route::get('/', [MediaController::class, 'index']);
        Route::post('/upload', [MediaController::class, 'upload']);
        Route::patch('/{id}', [MediaController::class, 'update']);
        Route::delete('/{id}', [MediaController::class, 'destroy']);
        Route::get('/folders/list', [MediaController::class, 'folders']);
    });
});
