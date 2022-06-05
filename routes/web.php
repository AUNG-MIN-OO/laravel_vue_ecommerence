<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>"admin","namespace"=>"Admin"],function (){
    Route::resource('/category','CategoryController');
    Route::resource('/product','ProductController');
});

