@extends('layouts.app')

@section('content')
<div class="container py-5 text-center">
    <h2 class="mb-4">💳 Balans</h2>

    <div class="row justify-content-center mb-4">
        <div class="col-md-4">
            <div class="card border-success shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="card-title">Jami Kirim</h5>
                    <p class="card-text text-success fw-bold">{{ $income }} so'm</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-danger shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="card-title">Jami Chiqim</h5>
                    <p class="card-text text-danger fw-bold">{{ $expense }} so'm</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-primary shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="card-title">Balans</h5>
                    <p class="card-text fw-bold">{{ $balance }} so'm</p>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('welcome') }}" class="btn btn-outline-secondary">🔙 Ortga</a>
</div>
@endsection
