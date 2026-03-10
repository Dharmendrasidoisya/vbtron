<?php

use Botble\Base\Facades\AdminHelper;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Botble\Career\Http\Controllers'], function () {
    AdminHelper::registerRoutes(function () {
        Route::group(['prefix' => 'career-categories', 'as' => 'career_category.'], function () {
            Route::resource('', 'CareerCategoryController')->parameters(['' => 'career_category']);
        });

        Route::group(['prefix' => 'careers', 'as' => 'career.'], function () {
            Route::resource('', 'CareerController')->parameters(['' => 'career']);
        });

        Route::group(['prefix' => 'settings'], function () {
            Route::get('careers', [
                'as' => 'careers.settings',
                'uses' => 'Settings\CareerSettingController@edit',
            ]);

            Route::put('careers', [
                'as' => 'careers.settings.update',
                'uses' => 'Settings\CareerSettingController@update',
                'permission' => 'careers.settings',
            ]);
        });
    });

    // Frontend route
    Route::get('/career-details/{id}', [
        'as' => 'public.career.details',
        'uses' => 'CareerController@details',
    ]);
});