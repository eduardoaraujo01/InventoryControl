@extends('layouts.app')
@section('content')
    <h3>Unidade de Medida: #{{ $unitOfMeasurement->id }}</h3>
    <table class="table" >
        <tbody>
            <tr>
                <td style="width: 250px">
                    <strong>
                        Medida:
                    </strong>
                </td>
                <td>{{ $unitOfMeasurement->name }}</td>
            </tr>

        </tbody>
    </table>
    <div class="inputArea">
        <br>
        <button class="btn" id="delete">Excluir</button>
        <a href="{{ route('unitOfMeasurements.edit', [$unitOfMeasurement]) }}" class="btn btn-primary">Alterar
        </a>
    </div>
    @push('script')
    <script>
        jQuery(document).ready(function ($) {
            $('#delete').on('click', function (evt) {
                evt.preventDefault()
                if (confirm('Deseja realmente excluir " {{ $unitOfMeasurement->name }} " das unidades de medida?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: '{{route('unitOfMeasurements.destroy', [ $unitOfMeasurement ])}}',
                    })
                        .done(function (data) {
                        if (!data.error) {
                            window.location.href = '{{route('unitOfMeasurements.index')}}'
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

