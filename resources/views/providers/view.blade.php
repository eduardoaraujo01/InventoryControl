<x-layout page="B7Web Todo: Login">
    <h1>Fornecedor: #{{ $provider->id }}</h1>
    <table class="table">
        <tbody>
            <tr>
                <td style="width: 250px">
                    <strong>
                        Fornecedor
                    </strong>
                </td>
                <td>{{ $provider->name }}</td>
            </tr>
            <tr>
                <td style="width: 250px">
                    <strong>
                        Endereço
                    </strong>
                </td>
                <td>{{ $provider->address }}</td>
            </tr>
            <tr>
                <td style="width: 250px">
                    <strong>
                        Contato
                    </strong>
                </td>
                <td>{{ $provider->phone }}</td>
            </tr>
            <tr>
                <td style="width: 250px">
                    <strong>
                        Email
                    </strong>
                </td>
                <td>{{ $provider->email }}</td>
            </tr>

        </tbody>
    </table>
    <div class="inputArea">
        <br>
        <button class="btn" id="delete">Excluir</button>
        <a href="{{ route('providers.edit', [$provider]) }}" class="btn btn-primary">Alterar
        </a>
    </div>
    <script>
        jQuery(document).ready(function ($) {
            $('#delete').on('click', function (evt) {
                evt.preventDefault()
                if (confirm('Deseja realmente excluir {{$provider->name}} da lista de Fornecedores?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: '{{route('products.destroy', [$provider])}}',
                    })
                        .done(function (data) {
                        if (!data.error) {
                            window.location.href = '{{route('providers.index')}}'
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
</x-layout>
