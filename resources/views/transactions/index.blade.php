@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">📒 Tranzaksiyalar Ro‘yxati</h2>

    <div class="text-end mb-3">
        <a href="{{ route('transactions.create') }}" class="btn btn-success">➕ Yangi Tranzaksiya</a>
    </div>

    @if($transactions->count())
        <table class="table table-striped table-bordered">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Tur</th>
                    <th>Summasi</th>
                    <th>Tavsif</th>
                    <th>Sana</th>
                    <th>Amallar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ ucfirst($transaction->type) }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->description }}</td>
                    <td>{{ $transaction->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" onsubmit="return confirm('Rostdan o‘chirmoqchimisiz?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">🗑️ O‘chirish</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info text-center">Hali tranzaksiya yo‘q.</div>
    @endif
    <div class="text-center mt-4">
        <a href="{{ route('welcome') }}" class="btn btn-outline-secondary">🏠 Bosh sahifaga qaytish</a>
    </div>
</div>

@endsection
