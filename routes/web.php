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

Route::group(['prefix' => 'admin'], function () {

    // Route::get('/', 'App\Http\Controllers\Backend\PagesController@index')->middleware(['auth'])->name('dashboard');
    Route::get('/dashboard', 'App\Http\Controllers\Backend\PagesController@index')->name('dashboard');

    // Category Routes
    Route::group(['prefix' => 'category'], function () {
        Route::get('/manage', 'App\Http\Controllers\Backend\CategoryController@index')->name('category.manage');
        Route::get('/create', 'App\Http\Controllers\Backend\CategoryController@create')->name('category.create');
        Route::post('/store', 'App\Http\Controllers\Backend\CategoryController@store')->name('category.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\CategoryController@edit')->name('category.edit');
        Route::post('/update/{id}', 'App\Http\Controllers\Backend\CategoryController@update')->name('category.update');
        Route::post('/delete/{id}', 'App\Http\Controllers\Backend\CategoryController@destroy')->name('category.destroy');
    });

    // user Routes
    Route::group(['prefix' => 'user'], function () {
        Route::get('/manage', 'App\Http\Controllers\Backend\UserController@index')->name('user.manage');
        Route::get('/create', 'App\Http\Controllers\Backend\UserController@create')->name('user.create');
        Route::post('/store', 'App\Http\Controllers\Backend\UserController@store')->name('user.store');
        Route::get('/edit/{slug}', 'App\Http\Controllers\Backend\UserController@edit')->name('user.edit');
        Route::post('/update/{id}', 'App\Http\Controllers\Backend\UserController@update')->name('user.update');
        Route::post('/delete/{id}', 'App\Http\Controllers\Backend\UserController@destroy')->name('user.destroy');

        Route::get('/profile/{slug}', 'App\Http\Controllers\Backend\UserController@show')->name('user.profile');
    });

    //Product Routes
    Route::group(['prefix' => 'products'], function () {
        Route::get('/manage', 'App\Http\Controllers\Backend\ProductController@index')->name('product.manage');
        Route::get('/create', 'App\Http\Controllers\Backend\ProductController@create')->name('product.create');
        Route::post('/store', 'App\Http\Controllers\Backend\ProductController@store')->name('product.store');
        Route::get('/edit/{slug}', 'App\Http\Controllers\Backend\ProductController@edit')->name('product.edit');
        Route::post('/update/{id}', 'App\Http\Controllers\Backend\ProductController@update')->name('product.update');
        Route::post('/delete/{id}', 'App\Http\Controllers\Backend\ProductController@destroy')->name('product.destroy');
    });

    // Slider Routes
    Route::group(['prefix' => 'slider'], function () {
        Route::get('/manage', 'App\Http\Controllers\Backend\CommentController@index')->name('slider.manage');
        Route::get('/create', 'App\Http\Controllers\Backend\CommentController@create')->name('slider.create');
        Route::post('/store', 'App\Http\Controllers\Backend\CommentController@store')->name('slider.store');
        Route::get('/edit/{}', 'App\Http\Controllers\Backend\CommentController@edit')->name('slider.edit');
        Route::post('/update/{id}', 'App\Http\Controllers\Backend\CommentController@update')->name('slider.update');
        Route::post('/delete/{id}', 'App\Http\Controllers\Backend\CommentController@destroy')->name('slider.destroy');
    });
});
