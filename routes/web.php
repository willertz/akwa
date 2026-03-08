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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/upload-image','UploadController@upload');

Route::get('home/{any}', 'HomeController@index')->where('any', '.*');
/**
 * Роуты для навигации по сайту
 */
Route::get('/','PageController@showIndexPage')->name('showIndexPage');
Route::get('/test','PageController@showIndexTestPage')->name('showIndexTestPage');
Route::get('/objects','PageController@showObjectsListPage')->name('showObjectsListPage');
Route::get('/object/{id}','PageController@showObjectPage')->name('showObjectPage');
Route::get('/blog','PageController@showArticlesListPage')->name('showArticlesListPage');
Route::get('/blog/{article}','PageController@showArticlePage')->name('showArticlePage');
Route::get('/price','PageController@showPricePage')->name('showPricePage');
Route::get('/contacts','PageController@showContactPage')->name('showContactPage');
Route::get('/internet-magazin','PageController@showShopHeadPage')->name('showShopHeadPage');
Route::get('/catalog/{any}','PageController@showCategoryPage')->name('showCategoryPage')->where('any', '.*');
Route::get('/goods/{item}','PageController@showItemPage')->name('showItemPage');
Route::get('/cart','PageController@showCart')->name('showCart');
Route::get('/thanks','PageController@showThanks')->name('showThanks');
Route::get('/video','PageController@showVideo')->name('showVideo');
/**
 * Роуты для API
 */
Route::any('/api','ApiController@index')->name('apiRoute');
