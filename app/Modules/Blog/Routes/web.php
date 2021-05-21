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

Route::prefix('blog')->as('blog.')->group(function() {
    Route::get('/','BlogController@returnAllArticles')->name('index');
    Route::get('/{categorySlug?}','BlogController@returnAllArticles')->name('category');
    Route::get('/{categorySlug?}/{articleSlug?}','BlogController@returnSingleArticle')->name('article');
});
