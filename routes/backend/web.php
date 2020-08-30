<?php

use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'admin'], function() {
    Auth::routes(['register' => false, 'verify' => true]);

    Route::group([
        'middleware' => ['auth','verified','role:owner|super_admin|admin|user'],
        'namespace' =>'BackEnd'
        ], function() {

        Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

        // Admins Link
        Route::get('/admins', 'AdminController@index')->name('admin.index');
        Route::get('/admin/create', 'AdminController@create')->name('admin.create');
        Route::get('/admin/edit/{id}', 'AdminController@edit')->name('admin.edit');
        Route::get('/admin/delete/{id}', 'AdminController@destroy')->name('admin.delete');
        Route::post('/admin/update/{id}', 'AdminController@update')->name('admin.update');
        Route::post('/admin/store', 'AdminController@store')->name('admin.store');


        // Categories Link
        Route::get('/categories', 'CategoryController@index')->name('category.index');
        Route::get('/category/create', 'CategoryController@create')->name('category.create');
        Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('category.delete');
        Route::post('/category/update/{id}', 'CategoryController@update')->name('category.update');
        Route::post('/category/store', 'CategoryController@store')->name('category.store');


        // Tags Link
        Route::get('/tags', 'TagController@index')->name('tag.index');
        Route::get('/tag/create', 'TagController@create')->name('tag.create');
        Route::get('/tag/edit/{id}', 'TagController@edit')->name('tag.edit');
        Route::get('/tag/delete/{id}', 'TagController@destroy')->name('tag.delete');
        Route::post('/tag/update/{id}', 'TagController@update')->name('tag.update');
        Route::post('/tag/store', 'TagController@store')->name('tag.store');


        // Post Link
        Route::get('/posts', 'PostController@index')->name('post.index');
        Route::get('/post/create', 'PostController@create')->name('post.create');
        Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');
        Route::post('/post/update/{id}', 'PostController@update')->name('post.update');
        Route::post('/post/store', 'PostController@store')->name('post.store');
        Route::get('/post/trash', 'PostController@trash')->name('post.trash');
        Route::get('/post/trash/{id}', 'PostController@destroy')->name('post.delete');
        Route::get('/post/delete/{id}', 'PostController@harddelete')->name('post.harddelete');
        Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');

        // Galary Link
        Route::get('/galarys', 'PhotoController@index')->name('galary.index');
        Route::get('/image/create', 'PhotoController@create')->name('image.create');
        Route::get('/image/edit/{id}', 'PhotoController@edit')->name('image.edit');
        Route::get('/image/delete/{id}', 'PhotoController@destroy')->name('image.delete');
        Route::post('/image/update/{id}', 'PhotoController@update')->name('image.update');
        Route::post('/image/store', 'PhotoController@store')->name('image.store');

        // Profile Link
        Route::get('/profile/{id}', 'ProfileController@show')->name('profile.show');
        Route::post('/profile/update/{id}/', 'ProfileController@update')->name('profile.update');
        Route::get('/profile/edit/{id}', 'ProfileController@edit')->name('profile.edit');


        // Setting Link
        Route::get('/setting', 'SettingController@index')->name('setting.index');
        Route::post('/setting/update/{id}', 'SettingController@update')->name('setting.update');
        Route::get('/setting/edit/{id}', 'SettingController@edit')->name('setting.edit');


        // Contact-Us
        Route::get('/contact', 'ContactController@index')->name('contact.index');
        Route::get('/contact/message/{id}', 'ContactController@show')->name('contact.show');
        Route::get('/contact/delete/{id}', 'ContactController@destroy')->name('contact.delete');

    }); // End Route Group Back-End With Middleware

}); // End Route Group Prefix Admin

