<x-layout page="B7Web Todo: Login">
    <x-slot:btn>
        <a href="{{route('register')}}" class="btn btn-primary">
            Registre-se
        </a>
        
    </x-slot:btn>

    Tela de login
    <br>
    
    <a href="{{route('home')}}">
        Ir para home
    </a>
</x-layout>