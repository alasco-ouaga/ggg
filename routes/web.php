<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\accountController;
use App\Http\Controllers\Api\propertiesController;
use App\Http\Controllers\LocalityController;
use App\Http\Controllers\programming\programingController;
use App\Http\Controllers\programming\RealEstateAgentController;
use Botble\RealEstate\Models\Account;
use FontLib\Table\Type\name;

Route::group([
    'prefix' => 'api/v1',
], function () {
    
    //account
    Route::post('account/create', [accountController::class, "create"]);
    Route::post('account/update', [accountController::class, "update"]);
    Route::post('account/login', [accountController::class, "login"]);
    Route::get('account/{user_id}', [accountController::class, "account"]);

    //properties
    Route::post('property/create', [propertiesController::class, "create"]);
    Route::get('account/properties/{account_id}', [propertiesController::class, "account_properties"]);
    Route::get('properties/{maximum}', [propertiesController::class, "properties"]);
    Route::get('property/data/{property_id}', [propertiesController::class, "PropertyData"]);
    Route::delete('property/delete/{property_id}', [propertiesController::class, "delete"]);
    Route::get('property/creating/data', [propertiesController::class, "property_creating_data"]);
    Route::get('property/countries', [propertiesController::class, "get_countries"]);
    Route::get('property/states/{country_id}', [propertiesController::class, "get_states"]);
    Route::get('property/cities/{state_id}', [propertiesController::class, "get_cities"]);
    Route::get('property/categories', [propertiesController::class, "get_categories"]);
    Route::post('properties/search', [propertiesController::class, "propertiesFilter"]);

    //Programing search
    Route::post('search/programing', [programingController::class, "save_programing_data"]);
    Route::get('programing/data', [programingController::class, "propertyProgramingSession"]);
    Route::post('property/programing/save', [programingController::class, "propertyProgramingSave"]);
    Route::post('property/programing/click', [programingController::class, "programing_search_click"]);
    Route::post('project/programing/save', [programingController::class, "projectProgramingSave"]);

    //Devenir Agent
    Route::post('account/become/agent/data', [RealEstateAgentController::class, "save_become_Agent_data"]);
    // Route::get('test', [RealEstateAgentController::class, "become_real_state"]);

});
Route::get('localities', [LocalityController::class, "getList"])->name("localities.index");
Route::post('localities/save', [LocalityController::class, "locality_save"])->name("localities.save");





