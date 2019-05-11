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

Route::get('/', 'IndexController@index');

Route::resource('article','ArticleController');
Route::post('article/uploadPhotos','ArticleController@uploadPhotos');

Auth::routes();

Route::get('/dashboard', 'ArticleController@index')->name('dashboard');

Route::get('/getDatatableArticles', [
    'as' => 'getDatatableArticles.data', 'uses' => 'ArticleController@getDatatableArticles',
]);
