<?php
use App\Http\Controllers\Api\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('transactions', TransactionController::class);
Route::get('/balance', [TransactionController::class, 'balance']);
Route::get('/transactions/{period}', [TransactionController::class, 'filterByPeriod']);
