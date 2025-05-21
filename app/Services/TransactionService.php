<?php

namespace App\Services;

use App\Models\Transaction;

class TransactionService
{
    public function list()
    {
        return Transaction::latest()->get();
    }

    public function create(array $data)
    {
        return Transaction::create($data);
    }

    public function findById($id)
    {
        return Transaction::find($id);
    }

    public function update(Transaction $transaction, array $data)
    {
        $transaction->update($data);
        return $transaction;
    }

    public function delete(Transaction $transaction)
    {
        return $transaction->delete();
    }

    public function getBalance()
    {
        $income = Transaction::where('type', 'income')->sum('amount');
        $expense = Transaction::where('type', 'expense')->sum('amount');
        return $income - $expense;
    }

    public function listByPeriod($period)
    {
        $query = Transaction::query();

        match ($period) {
            'daily' => $query->whereDate('created_at', today()),
            'weekly' => $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]),
            'monthly' => $query->whereMonth('created_at', now()->month),
            default => null,
        };

        return $query->latest()->get();
    }

    public function getTotalAmountByType(string $type): float
    {
        return Transaction::where('type', $type)->sum('amount');
    }
}
