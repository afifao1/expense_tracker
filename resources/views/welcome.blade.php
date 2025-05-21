@extends('layouts.app')

@section('content')
<div class="container py-5 text-center">
    <h1 class="mb-4">💰 Xarajatlar Monitoring Platformasi</h1>

    <div class="row justify-content-center mb-5">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">📅 Kunlik hisobot</h5>
                    <p class="card-text">Bugungi kirim-chiqimlarni ko‘rish</p>
                    <a href="{{ route('transactions.filter', 'daily') }}" class="btn btn-primary">Ko‘rish</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">📊 Haftalik hisobot</h5>
                    <p class="card-text">So‘nggi 7 kunlik tranzaksiyalarni tahlil qilish</p>
                    <a href="{{ route('transactions.filter', 'weekly') }}" class="btn btn-primary">Ko‘rish</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">📆 Oylik hisobot</h5>
                    <p class="card-text">Bu oyning barcha xarajat va daromadlari</p>
                    <a href="{{ route('transactions.filter', 'monthly') }}" class="btn btn-primary">Ko‘rish</a>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-4">

    <h4 class="mb-3">🔗 Boshqa foydali sahifalar</h4>
    <a href="{{ route('transactions.index') }}" class="btn btn-outline-secondary m-1">Tranzaksiyalar ro‘yxati</a>
    <a href="{{ route('transactions.create') }}" class="btn btn-outline-secondary m-1">Yangi tranzaksiya</a>
    <a href="{{ route('balance') }}" class="btn btn-outline-secondary m-1">Balans</a>
    <a href="{{ route('monitor') }}" class="btn btn-outline-secondary m-1">Monitoring</a>
</div>
@endsection
