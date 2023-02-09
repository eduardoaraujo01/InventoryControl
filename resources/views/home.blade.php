@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-success text-white">{{ __('Produtos') }}</div>
                    <div class="card-body text-center">
                        <h1>{{ $products }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-warning text-white">{{ __('Produtos com baixo estoque') }}</div>
                    <div class="card-body text-center">
                        <h1>{{ $lowStock->count() }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-danger text-white">{{ __('Produtos em falta') }}</div>
                    <div class="card-body text-center">
                        <h1>{{ $outOfStock->count() }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Produtos com baixo estoque') }}</div>

                    <div class="card-body">
                        @include('products._table', ['products' => $lowStock])
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Produtos em falta') }}</div>

                    <div class="card-body">
                        @include('products._table', ['products' => $outOfStock])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
