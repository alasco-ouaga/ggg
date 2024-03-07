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

use App\Http\Controllers\programming\RealEstateAgentController;
Route::get('test', [RealEstateAgentController::class, "become_real_state_agent_data_test"]);
Route::get('products', [RealEstateAgentController::class, "become_real_state_agent_data_test"]);
Route::post('account/real/state/agent/request/data', [RealEstateAgentController::class, "become_real_state_agent_data"]);


