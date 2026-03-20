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

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::post('/upload-image', 'UploadController@upload');

    Route::get('home/{any}', 'HomeController@index')->where('any', '.*');
    /**
     * Роуты для навигации по сайту
     */
    Route::get('/', 'PageController@showIndexPage')->name('showIndexPage');
    Route::get('/test', 'PageController@showIndexTestPage')->name('showIndexTestPage');
    Route::get('/objects', 'PageController@showObjectsListPage')->name('showObjectsListPage');
    Route::get('/object/{object}', 'PageController@showObjectPage')->name('showObjectPage');
    Route::get('/blog', 'PageController@showArticlesListPage')->name('showArticlesListPage');
    Route::get('/blog/{article}', 'PageController@showArticlePage')->name('showArticlePage');
    Route::get('/price', 'PageController@showPricePage')->name('showPricePage');
    Route::get('/contacts', 'PageController@showContactPage')->name('showContactPage');
    Route::get('/internet-magazin', 'PageController@showShopHeadPage')->name('showShopHeadPage');
    Route::get('/catalog/{any}', 'PageController@showCategoryPage')->name('showCategoryPage')->where('any', '.*');
    Route::get('/goods/{item}', 'PageController@showItemPage')->name('showItemPage');
    Route::get('/cart', 'PageController@showCart')->name('showCart');
    Route::get('/thanks', 'PageController@showThanks')->name('showThanks');
    Route::get('/video', 'PageController@showVideo')->name('showVideo');
    /**
     * Роуты для API
     */
    Route::group(['prefix' => 'api'], function () {
        Route::post('/send-mail', 'ApiController@sendMessage');
        Route::post('/send-cart', 'CartController@sendCart');

        Route::prefix('items')->group(function () {
            Route::get('/', 'ItemController@loadAllItems');
            Route::get('/{id}', 'ItemController@getItemById');
            Route::post('/save', 'ItemController@saveItem');
            Route::post('/new', 'ItemController@addNewItem');
            Route::delete('/{id}', 'ItemController@deleteItem');
        });

        Route::prefix('categories')->group(function () {
            Route::get('/', 'ShopCategoryController@getAllCategory');
            Route::get('/{id}', 'ShopCategoryController@loadSingleCat');
            Route::post('/new', 'ShopCategoryController@addNewCat');
            Route::post('/update', 'ShopCategoryController@updateCat');
            Route::delete('/{id}', 'ShopCategoryController@deleteCategory');
        });

        Route::prefix('articles')->group(function () {
            Route::get('/', 'ArticleController@loadArticlesForApi');
            Route::get('/{id}', 'ArticleController@loadSingleArt');
            Route::post('/new', 'ArticleController@saveNewArt');
            Route::post('/update', 'ArticleController@updateArticle');
            Route::delete('/{id}', 'ArticleController@deleteArt');
        });

        Route::prefix('objects')->group(function () {
            Route::get('/', 'AObjectController@getAllObjects');
            Route::get('/{id}', 'AObjectController@loadSingleObj');
            Route::post('/new', 'AObjectController@addNewObject');
            Route::post('/update', 'AObjectController@updateObj');
            Route::delete('/{id}', 'AObjectController@deleteObj');
        });

        Route::get('/notices', 'NoticeController@getNotice');
    });
});
