@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-center">📊 Tranzaksiyalar - {{ ucfirst($period) }} davr</h1>

    @if($transactions->isEmpty())
        <div class="alert alert-warning text-center">Hech qanday tranzaksiya topilmadi.</div>
    @else
        <table class="table table-hover table-bordered">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Tur</th>
                    <th>Summasi</th>
                    <th>Izoh</th>
                    <th>Sana</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ ucfirst($transaction->type) }}</td>
                    <td>{{ number_format($transaction->amount, 2) }}</td>
                    <td>{{ $transaction->description ?? '-' }}</td>
                    <td>{{ $transaction->created_at->format('Y-m-d H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="text-center mt-4">
        <a href="{{ route('welcome') }}" class="btn btn-outline-secondary">🔙 Orqaga</a>
    </div>
</div>
@endsection
