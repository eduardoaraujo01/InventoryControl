<table class="table table-striped">
    <thead class="thead-dark">
    <tr>
        <th>Produto</th>
        <th>Descrição</th>
        <th>Detalhes</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{$product->description }}</td>
            <td>
                <a href="{{route('products.show', [$product])}}">
                    <img src="/assets/images/icon-info.png"/>
                </a>
                @isset($showAction)
                    <a href="{{ route('products.edit', [$product]) }}">
                        <img src="/assets/images/icon-edit.png"/>
                    </a>
                    <button class="btn btn-link" id="delete-{{ $product->id }}">
                        <img src="/assets/images/icon-delete.png"/>
                    </button>
                @endif
            </td>

        </tr>
        @push('script')
            <script>
                jQuery(document).ready(function ($) {
                    $('#delete-{{ $product->id }}').on('click', function (evt) {
                        evt.preventDefault()
                        if (confirm('Deseja realmente deletar o produto {{ $product->name }}?')) {
                            $.ajax({
                                type: 'DELETE',
                                url: '{{route('products.destroy', [$product])}}',
                            })
                                .done(function (data) {
                                    if (!data.error) {
                                        window.location.href = '{{ route('products.index') }}'
                                    } else {
                                        alert('Erro ao deletar o produto {{ $product->name }}');
                                    }
                                }).fail(function() {
                                alert('Erro ao deletar produto o {{ $product->name }}');
                            })
                        }
                    })
                })
            </script>
        @endpush
    @endforeach
    </tbody>
</table>
@if($products instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="actions">
        {{ $products->links() }}
    </div>
@endif
