<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CurrencyConversionController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/most-conversion');
Route::get('/most-conversion', [CurrencyConversionController::class, 'mostConversion'])->name('mostConversion');
Route::get('/user-transaction-info', [TransactionController::class, 'userTransactionInfo'])->name('userTransactionInfo');
Route::get('/transaction-history', [TransactionController::class, 'transactionHistory'])->name('transactionHistory');
