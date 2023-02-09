<table class="table table-striped">
    <thead class="thead-dark">
    <tr>
        <th>Fornecedor</th>
        <th>Contato</th>
        <th>E-mail</th>

    </tr>
    </thead>
    <tbody>
    @foreach ($providers as $provider)
        <tr>
            <td>{{ $provider->name }}</td>
            <td>{{ $provider->phone }}</td>
            <td>{{ $provider->email }}</td>
            <td>
                <a href="{{route('providers.show', [$provider])}}">
                    <img src="/assets/images/icon-info.png"/>
                </a>
                @isset($showAction)
                    <a href="{{ route('providers.edit', [$provider]) }}">
                        <img src="/assets/images/icon-edit.png"/>
                    </a>
                    <button class="btn btn-link" id="delete-{{ $provider->id }}">
                        <img src="/assets/images/icon-delete.png"/>
                    </button>
                @endif
            </td>

        </tr>
        @push('script')
            <script>
                jQuery(document).ready(function ($) {
                    $('#delete-{{ $provider->id }}').on('click', function (evt) {
                        evt.preventDefault()
                        if (confirm('Deseja realmente deletar o Fornecedor: {{ $provider->name }}?')) {
                            $.ajax({
                                type: 'DELETE',
                                url: '{{route('products.destroy', [$provider])}}',
                            })
                                .done(function (data) {
                                    if (!data.error) {
                                        window.location.href = '{{ route('products.index') }}'
                                    } else {
                                        alert('Erro ao deletar o Fornecedor {{ $provider->name }}');
                                    }
                                }).fail(function() {
                                alert('Erro ao deletar Fornecedor {{ $provider->name }}');
                            })
                        }
                    })
                })
            </script>
        @endpush
    @endforeach
    </tbody>
</table>
@if($providers instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="actions">
        {{ $providers->links() }}
    </div>
@endif
