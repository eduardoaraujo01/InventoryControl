@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h2> Editar Fornecedor </h2>
                            <div>
                                <a href="{{route('providers.index')}}" class="btn btn-primary">
                                    Voltar
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('providers.update', [$provider])}}">
                            {{ method_field('PUT') }}
                            @csrf
                            <input type="hidden" name="id" value="{{$provider->id}}"/>
                            <div class="row">
                                <div class="col">
                                    <x-form.text_input
                                        name="name"
                                        label="Nome do Fornecedor:"
                                        required=required
                                        value="{{$provider->name}}"
                                    />
                                </div>
                                <div class="col">
                                    <x-form.text_input
                                        name="address"
                                        label="Endereço:"
                                        value="{{$provider->address}}"/>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col">
                                    <x-form.text_input
                                    type="number"
                                    name="phone"
                                    label="Contato:"
                                    value="{{$provider->phone}}"/>
                                </div>

                                <div class="col">
                                    <x-form.text_input
                                        type="email"
                                        name="email"
                                        label="E-mail:"
                                        value="{{$provider->email}}"/>
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
