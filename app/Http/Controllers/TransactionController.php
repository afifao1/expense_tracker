<?php
namespace App\Http\Controllers;

use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected $service;

    public function __construct(TransactionService $service)
    {
        $this->service = $service;
    }

    // Barcha tranzaksiyalar ro'yxati
    public function index()
    {
        $transactions = $this->service->list();
        $balance = $this->service->getBalance();

        return view('transactions.index', compact('transactions', 'balance'));
    }


    // Yangi tranzaksiya qo'shish uchun forma
    public function create()
    {
        return view('transactions.create');
    }

    // Tranzaksiyani saqlash
    public function store(Request $request)
    {
        $data = $request->validate([
            'amount' => 'required|numeric',
            'type' => 'required|in:income,expense',
            'description' => 'nullable|string',
        ]);

        $this->service->create($data);

        return redirect()->route('transactions.index')->with('success', 'Tranzaksiya muvaffaqiyatli qo\'shildi!');
    }

    public function balance()
    {
        $transactions = $this->service->list();

        $income = $transactions->where('type', 'income')->sum('amount');
        $expense = $transactions->where('type', 'expense')->sum('amount');
        $balance = $income - $expense;

        return view('transactions.balance', compact('income', 'expense', 'balance'));
    }

    public function monitor()
    {
        $transactions = $this->service->list()->take(10); // oxirgi 10 ta

        return view('transactions.monitor', compact('transactions'));
    }

    public function filterByPeriod($period)
    {
        $query = $this->service->list();

        $filtered = match ($period) {
            'daily' => $query->where('created_at', '>=', now()->startOfDay()),
            'weekly' => $query->where('created_at', '>=', now()->startOfWeek()),
            'monthly' => $query->where('created_at', '>=', now()->startOfMonth()),
            default => collect(),
        };

        return view('transactions.filtered', [
            'transactions' => $filtered,
            'period' => $period
        ]);
    }

    public function destroy($id)
    {
        $transaction = $this->service->findById($id);
        if ($transaction) {
            $this->service->delete($transaction);
            return redirect()->route('transactions.index')->with('success', 'Tranzaksiya o\'chirildi!');
        }

        return redirect()->route('transactions.index')->with('error', 'Tranzaksiya topilmadi!');
    }
}
