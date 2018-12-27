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
Route::get('/', 'BlogController@index')->name('blog');
Route::get('/blog/{post}', 'BlogController@show')->name('blog.show');
Route::get('/category/{category}', 'BlogController@category')->name('category');
Route::get('/author/{author}', 'BlogController@author')->name('author');
Route::get('/tag/{tag}', 'BlogController@tag')->name('tag');

Auth::routes();

Route::get('/home', 'Backend\HomeController@index');
Route::get('/edit-account', 'Backend\HomeController@edit');
Route::put('/edit-account', 'Backend\HomeController@update');

Route::group(['as'=>'backend.','prefix'=>'backend','namespace'=>'Backend','middleware'=>['auth']], function (){
    Route::resource('/blog', 'BlogController');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/users', 'UsersController');
    Route::get('/users/confirm/{users}', 'UsersController@confirm')->name('users.confirm');
    Route::put('/blog/restore/{blog}', 'BlogController@restore')->name('blog.restore');
    Route::Delete('/blog/force-destroy/{blog}', 'BlogController@forceDestroy')->name('blog.force-destroy');
});