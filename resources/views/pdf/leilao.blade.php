@extends('info')

@section('cabecalho')
    Busca por Leilão
@endsection

@section('conteudo')
    <h2>Passagem por Leilão</h2>
    <table class="table mt-4">
        @if (($carro->leilao == "Não") || ($carro->leilao == "Indefinido"))
            <thead class="table-success">
            <tr>
                <th scope="col">Veiculo não possui passagens por leilões!</th>
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