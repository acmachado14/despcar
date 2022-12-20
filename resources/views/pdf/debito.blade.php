@extends('info')

@section('cabecalho')
    Consulta de Debitos
@endsection

@section('conteudo')

<h2>Debitos</h2>
<table class="table mt-4">
    @if (!$debitos->isEmpty())
        <thead class="table-danger">
            <tr>
                <th scope="col">Tipo</th>
                <th scope="col">Descrição</th>
                <th scope="col">Valor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($debitos as $debito)
                <tr>
                    <td> {{ $debito->tipo }} </td>
                    <td> {{ $debito->descricao }} </td>
                    <td > {{ $debito->valor}} </td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td> Total: {{ $valorTotal}} </td>
            </tr>
        </tbody>
    @else
        <thead class="table-success">
            <tr>
                <th scope="col">Veiculo não possui debitos!</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
    @endif

</table>
@endsection
