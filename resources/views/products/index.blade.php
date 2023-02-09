@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header hstack gap-2">
                        <span>{{ __('Produtos') }}</span>
                        <a href="{{route('products.create')}}" class="btn btn-primary ms-auto">
                            Cadastrar Produto
                        </a>
                    </div>

                    <div class="card-body">
                        @include('products._table', ['showAction' => true])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
