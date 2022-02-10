<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\UserJWTController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'api','prefix' => 'auth'], function($router) {
    Route::post('/register', [UserJWTController::class, 'register']);
    Route::post('/login', [UserJWTController::class, 'login']);
    Route::get('/logout', [UserJWTController::class, 'logout']);
    Route::post('/refresh', [UserJWTController::class, 'refresh']);
    Route::post('/profile', [UserJWTController::class, 'profile']);

    Route::post('/make_transaction_via_mm', [UserJWTController::class, 'transact_via_mobilemoney']);
    Route::post('/make_transaction_via_bon', [UserJWTController::class, 'transact_via_bon']);
    Route::get('/get_transactions', [UserJWTController::class, 'getTransactions']);
    Route::get('/get_today_sale', [UserJWTController::class, 'getTodaysSale']);

});
