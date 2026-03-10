<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'prefix' => 'api/v1',
    'namespace' => 'Botble\Application\Http\Controllers\API',
], function () {
    Route::get('search', 'PostController@getSearch');
    Route::get('applicationposts', 'PostController@index');
    Route::get('applicationcategories', 'CategoryController@index');
    Route::get('applicationtags', 'TagController@index');

    Route::get('applicationposts/filters', 'PostController@getFilters');
    Route::get('applicationposts/{slug}', 'PostController@findBySlug');
    Route::get('applicationcategories/filters', 'CategoryController@getFilters');
    Route::get('applicationcategories/{slug}', 'CategoryController@findBySlug');
});
