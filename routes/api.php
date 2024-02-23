<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

use App\Http\Controllers\programming\programingController;
use App\Http\Controllers\programming\RealEstateAgentController;


Route::get('/api/v1/property/programing/data', [programingController::class, "propertyProgramingSession"]);
Route::post('/api/v1/account/become/agent/data', [RealEstateAgentController::class, "save_become_Agent_data"]);


