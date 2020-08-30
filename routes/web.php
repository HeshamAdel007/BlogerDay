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

// Auth::routes();

// Route::get('/', function () {
//     return view('pages.front-end.home');
// });


Route::group(['namespace' =>'FrontEnd'], function() {

    // Home Page
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home.index');

    // Single Post Page
    Route::get('/post/{id}/{slug}', 'HomeController@post')->name('post.page');

    // Category Page
    Route::get('/category/{id}/{slug}', 'HomeController@category')->name('category.page');

    // Comment
    Route::post('/comment', 'CommentController@store')->name('comment.add');
    Route::post('/reply', 'CommentController@replyStore')->name('reply.add');

    // Contact Us Page
    Route::get('/contact-us', 'HomeController@contactPage')->name('contact.page');

    // Search Page
    Route::get('/post', 'HomeController@search')->name('search');
});

// Contact Us Page
Route::post('/contact', 'BackEnd\ContactController@store')->name('contact.store');

