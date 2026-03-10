<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'prefix' => 'api/v1',
    'namespace' => 'Botble\Products\Http\Controllers\API',
], function () {
    Route::get('search', 'PostController@getSearch');
    Route::get('productsposts', 'PostController@index');
    Route::get('productscategories', 'CategoryController@index');
    Route::get('productstags', 'TagController@index');

    Route::get('productsposts/filters', 'PostController@getFilters');
    Route::get('productsposts/{slug}', 'PostController@findBySlug');
    Route::get('productscategories/filters', 'CategoryController@getFilters');
    Route::get('productscategories/{slug}', 'CategoryController@findBySlug');
});
