<x-layout page="B7Web Todo: Login">
    <h1>Estoque: #{{ $stock->id }}</h1>
    <table class="table">
        <tbody>
            <tr>
                <td style="width: 250px">
                    <strong>
                        Produto
                    </strong>
                </td>
                <td>{{ $stock->product->name }}</td>
            </tr>
            <tr>
                <td style="width: 250px">
                    <strong>
                        Quantidade
                    </strong>
                </td>
                <td>{{ $stock->amount }}</td>
            </tr>
            <tr>
                <td style="width: 250px">
                    <strong>
                        Tipo de Lançamento
                    </strong>
                </td>
                <td>{{ $stock->type }}</td>
            </tr>


        </tbody>
    </table>
    <div class="inputArea">
        <br>
        <button class="btn" id="delete">Excluir</button>
        <a href="{{ route('stocks.edit', [$stock]) }}" class="btn btn-primary">Alterar
        </a>
    </div>
    <script>
        jQuery(document).ready(function ($) {
            $('#delete').on('click', function (evt) {
                evt.preventDefault()
                if (confirm('Deseja realmente excluir o Estoque do produto {{ $stock->product->name }} ?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: '{{route('stocks.destroy', [$stock])}}',
                    })
                        .done(function (data) {
                        if (!data.error) {
                            window.location.href = '{{route('stocks.index')}}'
                        } else {
                            alert('Erro ao deletar Estoque');
                        }
                    }).fail(function() {
                        alert('Erro ao deletar Estoque');
                    })
                }
            })
        })
    </script>
</x-layout>
