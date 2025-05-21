@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Yangi tranzaksiya qo‘shish</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="type" class="form-label">Tur</label>
            <select name="type" id="type" class="form-select" required>
                <option value="">Tanlang</option>
                <option value="income">Kirim (+)</option>
                <option value="expense">Chiqim (-)</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Summasi</label>
            <input type="number" step="0.01" name="amount" id="amount" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Tavsif (ixtiyoriy)</label>
            <input type="text" name="description" id="description" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Qo‘shish</button>
        <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Bekor qilish</a>
    </form>
</div>
@endsection
