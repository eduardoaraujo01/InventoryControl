@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header hstack gap-2">
                        <span>{{ __('Estoque') }}</span>
                        <a href="{{route('stocks.create')}}" class="btn btn-primary ms-auto">
                            Cadastrar Lançamento
                        </a>
                    </div>

                    <div class="card-body">
                        @include('stocks._table', ['showAction' => true])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
