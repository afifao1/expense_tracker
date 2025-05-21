<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\TransactionService;
use App\Models\Transaction;

class TransactionController extends Controller
{
    protected $service;

    public function __construct(TransactionService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->list();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'amount' => 'required|numeric',
            'type' => 'required|in:income,expense',
            'description' => 'nullable|string',
        ]);

        return $this->service->create($data);
    }

    public function destroy(Transaction $transaction)
    {
        return $this->service->delete($transaction);
    }

    public function balance()
    {
        return response()->json([
            'balance' => $this->service->getBalance()
        ]);
    }

    public function filterByPeriod($period)
    {
        return $this->service->listByPeriod($period);
    }

}
