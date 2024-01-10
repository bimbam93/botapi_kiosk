<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\KioskApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/ping', [ApiController::class, 'index']);

Route::get('{api_key}/products/', [KioskApiController::class, 'products'])
    ->middleware('api_key');

Route::get('{api_key}/orders', [KioskApiController::class, 'orders'])
    ->middleware('api_key');

Route::get('{api_key}/orders/all', [KioskApiController::class, 'ordersAll'])
    ->middleware('api_key');

Route::post('{api_key}/order', [KioskApiController::class, 'order'])
    ->middleware('api_key');
