@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header hstack gap-2">
                        <span>{{ __('Unidades de Medidas') }}</span>
                        <a href="{{route('unitOfMeasurements.create')}}" class="btn btn-primary ms-auto">
                            Cadastrar Unid. de Medida
                        </a>
                    </div>

                    <div class="card-body">
                        @include('unitOfMeasurements._table', ['showAction' => true])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
