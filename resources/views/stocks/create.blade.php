@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2> Cadastrar Lançamento </h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('stocks.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label>Produto:</label>
                                        <select class="js-example-basic-single form-select" name="product_id">
                                            <option disabled selected>Selecione um produto</option>
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>

                                </div>
                                <div class="col">
                                    <x-form.text_input
                                        type="number"
                                        name="amount"
                                        label="Quantidade :"
                                    />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Tipo de Lançamento:</label>
                                        <select class="form-select" name="type">
                                            <option disabled selected>Selecione o tipo</option>
                                            <option value="CREDIT">Credito</option>
                                            <option value="DEBIT">Debito</option>

                                        </select>

                                </div>
                                <div class="col"></div>
                            </div>

                            <div class="d-flex justify-content-end">
                            <x-form.form_button resetTxt="Resetar" submitTxt="Realizar Lançamento"/>
                            </div>
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

