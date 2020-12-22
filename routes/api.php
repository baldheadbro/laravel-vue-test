<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\serviceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// CRUD requests
Route::put('/service', [serviceController::class, 'create']);
Route::get('/service', [serviceController::class, 'read']); // I will pass service id in the request body, not like /service/{id} cos it's not a web request
Route::post('/service', [serviceController::class, 'update']);
Route::delete('/service', [serviceController::class, 'delete']); // I will pass service id in the request body, not like /service/{id} cos it's not a web request

// Get all records
Route::get('/serviceList', [serviceController::class, 'index']);

// Get Service Types
Route::get('/serviceTypeList', [serviceController::class, 'listServiceType']);
