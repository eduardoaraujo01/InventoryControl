
@extends('layouts.app')

@section('content')
    <h1>Produto: #{{ $product->id }}</h1>
    <table class="table">
        <tbody>
            <tr>
                <td style="width: 250px">
                    <strong>
                        Produto
                    </strong>
                </td>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <td style="width: 250px">
                    <strong>
                        Descrição
                    </strong>
                </td>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <td style="width: 250px">
                    <strong>
                        Und. Medida
                    </strong>
                </td>
                <td>{{ $product->unitOfMeasurement->name }}</td>
            </tr>

            <tr>
                <td style="width: 250px">
                    <strong>
                        Codigo de Barras
                    </strong>
                </td>
                <td>{{ $product->bar_code }}</td>
            </tr>
            <tr>
                <td style="width: 250px">
                    <strong>
                        Preço
                    </strong>
                </td>
                <td>R$ {{ $product->price }}</td>
            </tr>
            <tr>
                <td style="width: 250px">
                    <strong>
                        Custo
                    </strong>
                </td>
                <td>R$ {{ $product->cost }}</td>
            </tr>
            <tr>
                <td style="width: 250px">
                    <strong>
                        Fornecedor
                    </strong>
                </td>
                <td>{{ $product->provider->name }}</td>
            </tr>
        </tbody>
    </table>
    <div class="inputArea">
        <br>
        <button class="btn" id="delete">Excluir</button>
        <a href="{{ route('products.edit', [$product]) }}" class="btn btn-primary">Alterar
        </a>
    </div>
@push('script')
    <script>
        jQuery(document).ready(function ($) {
            $('#delete').on('click', function (evt) {
                evt.preventDefault()
                if (confirm('Deseja realmente deletar esse produto?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: '{{route('products.destroy', [$product])}}',
                    })
                        .done(function (data) {
                        if (!data.error) {
                            window.location.href = '{{route('products.index')}}'
                        } else {
                            alert('Erro ao deletar produto');
                        }
                    }).fail(function() {
                        alert('Erro ao deletar produto');
                    })
                }
            })
        })
    </script>
@endpush
@endsection
