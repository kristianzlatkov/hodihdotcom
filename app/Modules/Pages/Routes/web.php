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

Route::prefix('/pages')->as('pages')->group(function() {
    Route::get('/{slug}','PagesController@showStaticPage');
});

Route::prefix('attractions')->as('attractions.')->group(function() {
    Route::get('/','PagesController@returnAllArticles')->name('index');//Новини
    Route::get('/{slug}', 'PagesController@returnSingleArticle')->name('view');// Статия за новина
});
Route::prefix('news')->as('news.')->group(function() {
    Route::get('/','PagesController@returnAllArticles')->name('index');//Новини
    Route::get('/{slug}', 'PagesController@returnSingleArticle')->name('view');// Статия за новина
});
Route::prefix('new')->as('new.')->group(function() {
    Route::get('/','PagesController@returnAllArticles')->name('index');//Новини
    Route::get('/{slug}', 'PagesController@returnSingleArticle')->name('view');// Статия за новина
});

