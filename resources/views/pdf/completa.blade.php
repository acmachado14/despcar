@extends('info')

@section('cabecalho')
    Consulta Completa
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

    <h2>Passagem por Leilão</h2>
    <table class="table mt-4">
        @if (($carro->leilao == "Não") || ($carro->leilao == "Indefinido"))
            <thead class="table-success">
            <tr>
                <th scope="col">Veiculo não passagem por leilões!</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            @else
                <table class="table mt-4">
                    <thead class="table-danger">
                    <tr>
                        <th scope="col">Leilao</th>
                        <th scope="col">Remark</th>
                        <th scope="col">Descrição do Leilao</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td> {{ $carro->leilao }} </td>
                        <td> {{ $carro->remark }} </td>
                        <td> {{ $carro->descLeilao }} </td>
                    </tr>
                    </tbody>
                </table>
        @endif

    </table>
@endsection