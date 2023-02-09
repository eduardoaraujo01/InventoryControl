@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2> Cadastrar Fornecedor </h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('providers.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <x-form.text_input
                                        name="name"
                                        label="Nome:"
                                        required=required
                                    />
                                </div>
                                <div class="col">
                                    <x-form.text_input
                                        name="address"
                                        label="Endereço :"
                                    />
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <x-form.text_input
                                            type="number"
                                            name="phone"
                                            label="Contato:"
                                        />
                                    </div>
                                    <div class="col">
                                        <x-form.text_input
                                            name="email"
                                            label="E-mail:"
                                        />
                                    </div>
                                </div>


                                <x-form.form_button resetTxt="Resetar" submitTxt="Cadastrar Fornecedor"/>
                            </div>
                        </form>

@endsection
