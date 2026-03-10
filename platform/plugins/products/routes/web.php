<?php

use Botble\Base\Facades\AdminHelper;
use Botble\Theme\Facades\Theme;
use Illuminate\Support\Facades\Route;
use Botble\Products\Http\Controllers\ProductsCategoryController;
use Botble\Products\Http\Controllers\PostController;

use Botble\Products\Http\Controllers\ProductsPostController;


// Route::get('subcategory/{id}', [ProductsCategoryController::class, 'showSubcategories'])->name('subcategory');
// Route::get('subcategory/{id}/{slug}', [ProductsCategoryController::class, 'showSubcategories'])->name('subcategory');
Route::get('/subcategory/{id}', [ProductsCategoryController::class, 'subcategory'])->name('subcategory');
Route::get('/products-category/{id}', [ProductsCategoryController::class, 'show'])->name('productscategory.show');

// Route::get('/productspost/{id}', [PostController::class, 'show'])->name('productspost.show');
Route::get('/category/{id}/products', [ProductsCategoryController::class, 'showCategoryPosts'])->name('category.posts');

Route::get('/service-post/{id}', [ProductsPostController::class, 'show'])->name('servicepost.show');

Route::get('/wishlist', function () {
    return Theme::scope('wishlist')->render();
});

Route::group(['namespace' => 'Botble\Products\Http\Controllers'], function () {
    AdminHelper::registerRoutes(function () {
        Route::group(['prefix' => 'products'], function () {
            Route::group(['prefix' => 'productsposts', 'as' => 'productsposts.'], function () {
                Route::resource('', 'PostController')
                    ->parameters(['' => 'post']);

                Route::get('widgets/recent-productsposts', [
                    'as' => 'widget.recent-productsposts',
                    'uses' => 'PostController@getWidgetRecentproductsposts',
                    'permission' => 'productsposts.index',
                ]);
            });

            Route::group(['prefix' => 'productscategories', 'as' => 'productscategories.'], function () {
                Route::resource('', 'CategoryController')
                    ->parameters(['' => 'category']);

                Route::put('update-tree', [
                    'as' => 'update-tree',
                    'uses' => 'CategoryController@updateTree',
                    'permission' => 'productscategories.index',
                ]);
            });

            Route::group(['prefix' => 'productstags', 'as' => 'productstags.'], function () {
                Route::resource('', 'TagController')
                    ->parameters(['' => 'tag']);

                Route::get('all', [
                    'as' => 'all',
                    'uses' => 'TagController@getAllproductstags',
                    'permission' => 'productstags.index',
                ]);
            });
        });

        Route::group(['prefix' => 'settings/products', 'as' => 'products.settings', 'permission' => 'products.settings'], function () {
            Route::get('/', [
                'uses' => 'Settings\ProductsSettingController@edit',
            ]);

            Route::put('/', [
                'as' => '.update',
                'uses' => 'Settings\ProductsSettingController@update',
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
