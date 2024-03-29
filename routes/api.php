<?php

use App\Http\Controllers\Api\propertiesController;
use App\Http\Controllers\programming\RealEstateAgentController;
use App\Http\Controllers\testController;

Route::group(['prefix'=>"v1"] , function(){
    Route::post('user/real/sate/request',[RealEstateAgentController::class,"real_state_request"]);
    Route::post('user/create',[testController::class,"user_create"]);
    Route::get('city/{city_id}',[propertiesController::class,"get_city_id"]);


});


