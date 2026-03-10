<?php

use Botble\Base\Facades\AdminHelper;
use Botble\Theme\Facades\Theme;
use Illuminate\Support\Facades\Route;
use Botble\Application\Http\Controllers\ApplicationCategoryController;
use Botble\Application\Http\Controllers\PostController;

use Botble\Application\Http\Controllers\ApplicationPostController;


// Route::get('subcategory/{id}', [ApplicationCategoryController::class, 'showSubcategories'])->name('subcategory');
// Route::get('subcategory/{id}/{slug}', [ApplicationCategoryController::class, 'showSubcategories'])->name('subcategory');
Route::get('/subcategory/{id}', [ApplicationCategoryController::class, 'subcategory'])->name('subcategory');
Route::get('/application-category/{id}', [ApplicationCategoryController::class, 'show'])->name('applicationcategory.show');

// Route::get('/applicationpost/{id}', [PostController::class, 'show'])->name('applicationpost.show');
Route::get('/category/{id}/application', [ApplicationCategoryController::class, 'showCategoryPosts'])->name('category.posts');

Route::get('/service-post/{id}', [ApplicationPostController::class, 'show'])->name('servicepost.show');


Route::group(['namespace' => 'Botble\Application\Http\Controllers'], function () {
    AdminHelper::registerRoutes(function () {
        Route::group(['prefix' => 'application'], function () {
            Route::group(['prefix' => 'applicationposts', 'as' => 'applicationposts.'], function () {
                Route::resource('', 'PostController')
                    ->parameters(['' => 'post']);

                Route::get('widgets/recent-applicationposts', [
                    'as' => 'widget.recent-applicationposts',
                    'uses' => 'PostController@getWidgetRecentapplicationposts',
                    'permission' => 'applicationposts.index',
                ]);
            });

            Route::group(['prefix' => 'applicationcategories', 'as' => 'applicationcategories.'], function () {
                Route::resource('', 'CategoryController')
                    ->parameters(['' => 'category']);

                Route::put('update-tree', [
                    'as' => 'update-tree',
                    'uses' => 'CategoryController@updateTree',
                    'permission' => 'applicationcategories.index',
                ]);
            });

            Route::group(['prefix' => 'applicationtags', 'as' => 'applicationtags.'], function () {
                Route::resource('', 'TagController')
                    ->parameters(['' => 'tag']);

                Route::get('all', [
                    'as' => 'all',
                    'uses' => 'TagController@getAllapplicationtags',
                    'permission' => 'applicationtags.index',
                ]);
            });
        });

        Route::group(['prefix' => 'settings/application', 'as' => 'application.settings', 'permission' => 'application.settings'], function () {
            Route::get('/', [
                'uses' => 'Settings\ApplicationSettingController@edit',
            ]);

            Route::put('/', [
                'as' => '.update',
                'uses' => 'Settings\ApplicationSettingController@update',
            ]);
        });
    });

    if (defined('THEME_MODULE_SCREEN_NAME')) {
        Theme::registerRoutes(function () {
            Route::get('search', [
                'as' => 'public.search',
                'uses' => 'PublicController@getSearch',
            ]);
        });
    }
});
