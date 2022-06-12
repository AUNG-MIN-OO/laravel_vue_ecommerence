<?php

use Illuminate\Support\Facades\Route;

//User routes
Route::get('/register','User\AuthController@showRegister');
Route::post('/register','User\AuthController@register');
Route::get('/login','User\AuthController@showLogin');
Route::post('/login','User\AuthController@login');
Route::get('/logout','User\AuthController@logout');

Route::get('/','User\PageController@index');
Route::get('/product/detail/{slug}','User\PageController@productDetail');
Route::get('/product/category/{slug}','User\PageController@productByCategory');
Route::get('/product/search/{keyword}','User\PageController@productSearch');

//Admin routes
Route::get('admin/login','Admin\AuthController@showLogin');
Route::post('admin/login','Admin\AuthController@login');

Route::group(['prefix'=>"admin","namespace"=>"Admin"],function (){
    Route::get('/dashboard','AuthController@dashboard');
    Route::resource('/category','CategoryController');
    Route::resource('/product','ProductController');
});

