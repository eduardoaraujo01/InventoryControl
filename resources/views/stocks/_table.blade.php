<table class="table table-striped">
    <thead class="thead-dark">
    <tr>
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Tipo de Lançamento</th>

    </tr>
    </thead>
    <tbody>
    @foreach ($stocks as $stock)
        <tr>
            <td>{{ $stock->product->name }}</td>
            <td>{{ $stock->amount }}</td>
            <td>{{ $stock->type }}</td>


        </tr>
        @push('script')
            <script>
                jQuery(document).ready(function ($) {
                    $('#delete-{{ $stock->id }}').on('click', function (evt) {
                        evt.preventDefault()
                        if (confirm('Deseja realmente o Estoque do produto {{ $stock->product->name }}?')) {
                            $.ajax({
                                type: 'DELETE',
                                url: '{{route('stocks.destroy', [$stock])}}',
                            })
                                .done(function (data) {
                                    if (!data.error) {
                                        window.location.href = '{{ route('stocks.index') }}'
                                    } else {
                                        alert('Erro ao deletar o Estoque do produto {{ $stock->product->name }}');
                                    }
                                }).fail(function() {
                                alert('Erro ao deletar o Estoque do produto {{ $stock->product->name }}');
                            })
                        }
                    })
                })
            </script>
        @endpush
    @endforeach
    </tbody>
</table>
@if($stocks instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="actions">
        {{ $stocks->links() }}
    </div>
@endif
