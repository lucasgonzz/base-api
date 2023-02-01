<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function() {

    // Generals
    Route::post('search/{model_name}', 'SearchController@search');
    
    // User
    Route::get('user', 'UserController@user');
    Route::put('user/{id}', 'UserController@update');
    Route::put('user-password', 'UserController@updatePassword');

    // Images
    Route::post('set-image/{prop}', 'CommonLaravel\ImageController@setImage');
    Route::delete('delete-image-prop/{model_name}/{id}/{prop_name}', 'CommonLaravel\ImageController@deleteImageProp');
    Route::delete('delete-image-model/{model_name}/{model_id}/{image_id}', 'CommonLaravel\ImageController@deleteImageModel');

    Route::resource('product', 'ProductController');
    Route::resource('sale', 'SaleController')->except(['show']);
    Route::get('sale/{from_date}/{until_date?}', 'SaleController@index');
});
