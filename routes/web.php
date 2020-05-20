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
// Authentication
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('show.register');
Route::post('/register', 'Auth\RegisterController@register')->name('post.register');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('show.login');
Route::post('/login', 'Auth\LoginController@login')->name('post.login');
Route::post('/logout', 'Auth\LoginController@logout')->name('post.logout');
Route::get('/forgotpassword', 'Auth\ForgotPasswordController@showResetPassword')->name('show.reset');
Route::post('/forgotpassword', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('post.reset');
Route::get('/lockscreen','Auth\LockscreenController@index')->name('show.lockscreen');

// Admin Panel
Route::get('/dashboard','Admin\AdminController@index')->name('dashboard');
Route::get('/aritcle/create','Admin\ArticleController@create')->name('create.article');
Route::post('/aritcle/create','Admin\ArticleController@store')->name('post.article');
Route::get('/admin/profile','Admin\ProfileController@index')->name('show.profile');


// Website
Route::view('/coming-soon', 'website.comingsoon');
Route::get('/','WebsiteController@index')->name('index');
Route::get('/question','QuestionController@index')->name('question');
Route::get('/quotes','QuestionController@index')->name('quotes');
Route::get('/articles','ArticleController@index')->name('quotes');


// Crawler
Route::get('/question/crawl','QuestionController@crawlQuestion');
Route::get('/quotes/crawl','QuotesController@crawlQuotes');
Route::get('/articles/crawl','ArticleController@crawlArticle');