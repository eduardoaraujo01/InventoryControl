@extends('layouts.app')
    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">
            Voltar
        </a>

    </x-slot:btn>

@section('content')
            <h1> Cadastrar Unidade de Medida </h1>
            <form method="POST" action="{{route('unitOfMeasurements.store')}}">
                @csrf

                <x-form.text_input
                name="name"
                label="Unidade de Medida:"
                required=required
            />

               <x-form.form_button resetTxt="Resetar" submitTxt="Cadastrar Medida"/>

            </form>
@endsection
