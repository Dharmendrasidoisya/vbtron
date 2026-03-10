<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'prefix' => 'api/v1',
    'namespace' => 'Botble\Services\Http\Controllers\API',
], function () {
    Route::get('search', 'PostController@getSearch');
    Route::get('servicesposts', 'PostController@index');
    Route::get('servicescategories', 'CategoryController@index');
    Route::get('servicestags', 'TagController@index');

    Route::get('servicesposts/filters', 'PostController@getFilters');
    Route::get('servicesposts/{slug}', 'PostController@findBySlug');
    Route::get('servicescategories/filters', 'CategoryController@getFilters');
    Route::get('servicescategories/{slug}', 'CategoryController@findBySlug');
});
