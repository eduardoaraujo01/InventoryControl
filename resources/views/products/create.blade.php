@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <h2> Cadastrar Produto </h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('products.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <x-form.text_input
                                        name="name"
                                        label="Nome do Produto:"
                                        required=required
                                    />
                                </div>
                                <div class="col">
                                    <x-form.text_input
                                        name="description"
                                        label="Descrição do Produto:"
                                    />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <x-form.select_input
                                        name="unit_of_measurement_id"
                                        label="Unidade de Medida:">
                                        @foreach($unitOfMeasurements as $measurement)
                                            <option value="{{ $measurement->id }}">{{ $measurement->name }}</option>
                                        @endforeach
                                    </x-form.select_input>
                                </div>

                                <div class="col">
                                    <x-form.text_input
                                        type="number"
                                        name="bar_code"
                                        label="Codigo de Barras:"
                                    />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <x-form.text_input

                                        name="price"
                                        label="Preço de Venda:"
                                    />
                                </div>
                                <div class="col">
                                    <x-form.text_input

                                        name="cost"
                                        label="Preço de Compra:"
                                    />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <x-form.select_input
                                        name="provider_id"
                                        label="Fornecedor:">
                                        @foreach($providers as $provider)
                                            <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                        @endforeach
                                    </x-form.select_input>
                                </div>
                                <div class="col">
                                    <x-form.select_input
                                        name="category_id"
                                        label="Categoria:">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </x-form.select_input>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <x-form.text_input
                                        name="min_amount"
                                        label="Quantidade Minima:"/>
                                </div>
                                <div class="col">

                                </div>
                            </div>

                            <x-form.form_button resetTxt="Resetar" submitTxt="Criar Produto"/>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            $(document).ready(function () {

                $('.js-example-basic-single').select2({width: '100%'})
            });
        </script>
    @endpush
@endsection

