@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tranzaksiyalar - {{ ucfirst($period) }} davr uchun</h1>

        @if($transactions->isEmpty())
            <p>Hech qanday tranzaksiya topilmadi.</p>
        @else
            <table class="table table-bordered">
                <thead>
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

        <a href="{{ route('transactions.index') }}" class="btn btn-primary">Orqaga</a>
    </div>
@endsection
