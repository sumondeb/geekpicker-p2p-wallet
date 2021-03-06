<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\TransactionController;

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

Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('/user-profile', [UserController::class, 'userProfile']);
    Route::post('/logout', [UserController::class, 'logout']);

    Route::post('/send-money', [TransactionController::class, 'sendMoney']);
    
    Route::get('/user-transaction-info', [TransactionController::class, 'userTransactionInfo']);
    Route::get('/user-transaction-history', [TransactionController::class, 'userTransactionHistory']);
});
