<?php

use Botble\Base\Facades\AdminHelper;
use Botble\Theme\Facades\Theme;
use Illuminate\Support\Facades\Route;
use Botble\Services\Http\Controllers\ServicesCategoryController;
use Botble\Services\Http\Controllers\PostController;

use Botble\Services\Http\Controllers\ServicesPostController;


// Route::get('subcategory/{id}', [ServicesCategoryController::class, 'showSubcategories'])->name('subcategory');
// Route::get('subcategory/{id}/{slug}', [ServicesCategoryController::class, 'showSubcategories'])->name('subcategory');
Route::get('/subcategory/{id}', [ServicesCategoryController::class, 'subcategory'])->name('subcategory');
Route::get('/services-category/{id}', [ServicesCategoryController::class, 'show'])->name('servicescategory.show');

// Route::get('/servicespost/{id}', [PostController::class, 'show'])->name('servicespost.show');
Route::get('/category/{id}/services', [ServicesCategoryController::class, 'showCategoryPosts'])->name('category.posts');

Route::get('/service-post/{id}', [ServicesPostController::class, 'show'])->name('servicepost.show');


Route::group(['namespace' => 'Botble\Services\Http\Controllers'], function () {
    AdminHelper::registerRoutes(function () {
        Route::group(['prefix' => 'services'], function () {
            Route::group(['prefix' => 'servicesposts', 'as' => 'servicesposts.'], function () {
                Route::resource('', 'PostController')
                    ->parameters(['' => 'post']);

                Route::get('widgets/recent-servicesposts', [
                    'as' => 'widget.recent-servicesposts',
                    'uses' => 'PostController@getWidgetRecentservicesposts',
                    'permission' => 'servicesposts.index',
                ]);
            });

            Route::group(['prefix' => 'servicescategories', 'as' => 'servicescategories.'], function () {
                Route::resource('', 'CategoryController')
                    ->parameters(['' => 'category']);

                Route::put('update-tree', [
                    'as' => 'update-tree',
                    'uses' => 'CategoryController@updateTree',
                    'permission' => 'servicescategories.index',
                ]);
            });

            Route::group(['prefix' => 'servicestags', 'as' => 'servicestags.'], function () {
                Route::resource('', 'TagController')
                    ->parameters(['' => 'tag']);

                Route::get('all', [
                    'as' => 'all',
                    'uses' => 'TagController@getAllservicestags',
                    'permission' => 'servicestags.index',
                ]);
            });
        });

        Route::group(['prefix' => 'settings/services', 'as' => 'services.settings', 'permission' => 'services.settings'], function () {
            Route::get('/', [
                'uses' => 'Settings\ServicesSettingController@edit',
            ]);

            Route::put('/', [
                'as' => '.update',
                'uses' => 'Settings\ServicesSettingController@update',
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
