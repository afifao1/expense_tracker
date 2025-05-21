<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::resource('transactions', TransactionController::class);

Route::get('balance', [TransactionController::class, 'balance']);
Route::get('monitoring', [TransactionController::class, 'monitor']);

Route::get('transactions/filter/{period}', [TransactionController::class, 'filterByPeriod'])
    ->name('transactions.filter');
Route::get('/balance', [TransactionController::class, 'balance'])->name('balance');
Route::get('/monitor', [TransactionController::class, 'monitor'])->name('monitor');
