<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function() {

    // CommonLaravel 
    // ----------------------------------------------------------------------------------------------------
    // Generals
    Route::post('search/{model_name}', 'CommonLaravel\SearchController@search');
    Route::get('previus-day/{model_name}/{index}', 'CommonLaravel\PreviusDayController@previusDays');
    
    
    // User
    Route::get('user', 'CommonLaravel\UserController@user');
    Route::put('user/{id}', 'CommonLaravel\UserController@update');
    Route::put('user-password', 'CommonLaravel\UserController@updatePassword');

    // Employee
    Route::resource('employee', 'CommonLaravel\EmployeeController');

    // Permissions
    Route::get('permission', 'CommonLaravel\PermissionController@index');

    // Images
    Route::post('set-image/{prop}', 'CommonLaravel\ImageController@setImage');
    Route::delete('delete-image-prop/{model_name}/{id}/{prop_name}', 'CommonLaravel\ImageController@deleteImageProp');
    Route::delete('delete-image-model/{model_name}/{model_id}/{image_id}', 'CommonLaravel\ImageController@deleteImageModel');

    // ----------------------------------------------------------------------------------------------------

    Route::resource('product', 'ProductController');
    Route::resource('sale', 'SaleController')->except(['show']);
    Route::get('sale/{from_date}/{until_date?}', 'SaleController@index');
});
