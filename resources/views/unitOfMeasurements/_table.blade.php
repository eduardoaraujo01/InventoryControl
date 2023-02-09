<table class="table table-striped">
    <thead class="thead-dark">
    <tr>
        <th>Unidade de Medida</th>
        <th style="width: 150px"></th>
    </tr>
    </thead>
    <tbody>
    @foreach ($unitOfMeasurements as $unitOfMeasurement)
        <tr>
            <td>{{ $unitOfMeasurement->name }}</td>

            <td>
                <a href="{{route('unitOfMeasurements.show', [$unitOfMeasurement])}}">
                    <img src="/assets/images/icon-info.png"/>
                </a>
                @isset($showAction)
                    <a  href="{{ route('unitOfMeasurements.edit', [$unitOfMeasurement]) }}" >
                        <img src="/assets/images/icon-edit.png"/>
                    </a>
                    <button class="btn btn-link" id="delete-{{ $unitOfMeasurement->id }}">
                        <img src="/assets/images/icon-delete.png"/>
                    </button>
                @endif
            </td>

        </tr>
        @push('script')
            <script>
                jQuery(document).ready(function ($) {
                    $('#delete-{{ $unitOfMeasurement->id }}').on('click', function (evt) {
                        evt.preventDefault()
                        if (confirm('Deseja realmente deletar a medida: {{ $unitOfMeasurement->name }}?')) {
                            $.ajax({
                                type: 'DELETE',
                                url: '{{route('unitOfMeasurements.destroy', [$unitOfMeasurement])}}',
                            })
                                .done(function (data) {
                                    if (!data.error) {
                                        window.location.href = '{{ route('unitOfMeasurements.index') }}'
                                    } else {
                                        alert('Erro ao deletar o produto {{ $unitOfMeasurement->name }}');
                                    }
                                }).fail(function() {
                                alert('Erro ao deletar produto o {{ $unitOfMeasurement->name }}');
                            })
                        }
                    })
                })
            </script>
        @endpush
    @endforeach
    </tbody>
</table>
@if($unitOfMeasurements instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="actions">
        {{ $unitOfMeasurements->links() }}
    </div>
@endif
