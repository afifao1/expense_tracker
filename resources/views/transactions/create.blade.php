@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">📝 Yangi Tranzaksiya Qo‘shish</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transactions.store') }}" method="POST" class="mx-auto" style="max-width: 500px;">
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
            <input type="number" step="0.01" min="0" name="amount" id="amount" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Tavsif (ixtiyoriy)</label>
            <input type="text" name="description" id="description" class="form-control">
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">💾 Qo‘shish</button>
            <a href="{{ route('welcome') }}" class="btn btn-secondary">❌ Bekor qilish</a>
        </div>
    </form>
</div>
@endsection
