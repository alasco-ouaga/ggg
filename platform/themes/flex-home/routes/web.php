<?php

use Theme\FlexHome\Http\Controllers\FlexHomeController;

Route::group(['controller' => FlexHomeController::class, 'middleware' => ['web', 'core']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {
        Route::get('wishlist', 'getWishlist')->name('public.wishlist');
        
        Route::group(['prefix' => 'ajax', 'as' => 'public.ajax.'], function () {
            Route::get('cities', 'ajaxGetCities')->name('cities');
            Route::get('properties/map', 'ajaxGetPropertiesForMap')->name('properties.map');
            Route::get('projects-filter', 'ajaxGetProjectsFilter')->name('projects-filter');
            Route::post('/frontend/api/save/data', [StructureController::class, 'save_programing_data'])->name('save_programing_data');
        });
    });
});

Theme::routes();
