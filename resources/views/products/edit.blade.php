@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h2> Editar Produto </h2>
                            <div>
                                <a href="{{route('products.index')}}" class="btn btn-primary">
                                    Voltar
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{route('products.update', [$product])}}">
                            {{ method_field('PUT') }}
                            @csrf
                            <input type="hidden" name="id" value="{{$product->id}}"/>
                            <div class="row">
                                <div class="col">
                                    <x-form.text_input
                                        name="name"
                                        label="Nome do Produto:"
                                        required=required
                                        value="{{$product->name}}"
                                    />
                                </div>
                                <div class="col">
                                    <x-form.text_input
                                        name="description"
                                        label="Descrição do Produto:"
                                        value="{{$product->description}}"/>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col">
                                    <x-form.select_input
                                        name="unit_of_measurement_id"
                                        label="Unidade de Medida:">
                                        @foreach($unitOfMeasurements as $measurement)
                                            <option @if($measurement->id == $product->unit_of_measurement_id) selected @endif value="{{$measurement->id}}">{{ $measurement->name }}</option>
                                        @endforeach
                                    </x-form.select_input>
                                </div>

                                <div class="col">
                                    <x-form.text_input
                                        type="number"
                                        name="bar_code"
                                        label="Codigo de Barras:"
                                        value="{{$product->bar_code}}"/>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col">
                                    <x-form.text_input
                                        name="price"
                                        label="Preço de Venda:"
                                        value="{{$product->price}}"/>
                                </div>

                                <div class="col">
                                    <x-form.text_input

                                        name="cost"
                                        label="Preço de Compra:"
                                        value="{{$product->cost}}"/>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col">
                                    <x-form.select_input
                                        name="provider_id"
                                        label="Fornecedor:">
                                        @foreach($providers as $provider)
                                            <option @if($provider->id == $product->provider_id) selected @endif value="{{$provider->id}}">{{ $provider->name }}</option>
                                        @endforeach
                                    </x-form.select_input>
                                </div>

                                <div class="col">
                                    <x-form.text_input
                                        name="min_amount"
                                        label="Quantidade Minima:"
                                        value="{{$product->min_amount}}"/>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <x-form.form_button resetTxt="Resetar" submitTxt="Atualizar Produto"/>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>





        @endsection

