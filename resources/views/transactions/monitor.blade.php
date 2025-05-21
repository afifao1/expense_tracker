@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">📈 Oxirgi 10 Tranzaksiya</h2>

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>Tur</th>
                <th>Qiymat</th>
                <th>Izoh</th>
                <th>Sana</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ ucfirst($transaction->type) }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->description }}</td>
                    <td>{{ $transaction->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-center mt-4">
        <a href="{{ route('welcome') }}" class="btn btn-outline-secondary">🔙 Ortga</a>
    </div>
</div>
@endsection
