<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TransactionController;

Route::apiResource('transactions', TransactionController::class);
Route::get('/balance', [TransactionController::class, 'balance']);
Route::get('/transactions/{period}', [TransactionController::class, 'filterByPeriod']);
