@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tranzaksiyalar ro‘yxati</h2>

    <a href="{{ route('transactions.create') }}" class="btn btn-success mb-3">Yangi tranzaksiya qo‘shish</a>

    @if($transactions->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tur</th>
                    <th>Summasi</th>
                    <th>Tavsif</th>
                    <th>Qo‘shilgan sana</th>
                    <th>Amallar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->type }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->description }}</td>
                    <td>{{ $transaction->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" onsubmit="return confirm('Rostdan o‘chirmoqchimisiz?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">O‘chirish</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Hali tranzaksiya yo‘q.</p>
    @endif
</div>
@endsection
