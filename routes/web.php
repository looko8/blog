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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('sections', 'SectionController')->except(['show']);
Route::resource('articles', 'ArticleController');
Route::get('/users/{user}/sections', 'BlogController@showFullArticleList')->name('users.sections.articles.all');
Route::resource('users.sections.articles', 'BlogController')->only(['index', 'show']);
