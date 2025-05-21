<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

// Transaction resource route (index, create, store, show, edit, update, destroy)
Route::resource('transactions', TransactionController::class);

// Qo‘shimcha routelar
Route::get('balance', [TransactionController::class, 'balance']);
Route::get('monitoring', [TransactionController::class, 'monitor']);

// Filtrlash uchun route — period: daily, weekly, monthly
Route::get('transactions/filter/{period}', [TransactionController::class, 'filterByPeriod'])
    ->name('transactions.filter');
