<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controle de Carros</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<header>
    <img src="../images/logo.png" width=130px style="left: 0px; top: -10px; position: absolute">
    <h1 style="text-align:center">@yield('cabecalho')</h1>
    <p style="font-size: 12px; top: 50px; right: 0px; position: absolute">Data de Emissão: {{ $data }}</p>
    <hr style="padding-top: 10px">
</header>

<body>

<h2 style="padding-top: 10px">Dados do Veículo</h2>

<table class="table mt-4">
    <thead class="table-info">
    <tr>
        <th scope="col">Placa</th>
        <th scope="col">Descrição</th>
        <th scope="col">Ano</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td> {{ $carro->placa }} </td>
        <td> {{ $carro->descricao }} </td>
        <td> {{ $carro->ano }} </td>
    </tr>
    </tbody>
</table>

<table class="table mt-4">
    <thead class="table-info">
    <tr>
        <th scope="col">Chassi</th>
        <th scope="col">Tipo do Combustivel</th>
        <th scope="col">Origem</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td> {{ $carro->chassi }} </td>
        <td> {{ $carro->combustivel }} </td>
        <td> {{ $carro->lugar }} </td>
    </tr>
    </tbody>
</table>

@yield('conteudo')

<h3 >Observações</h3>
<ul>
    <li> O sistema depende de várias bases de dados para trazer precisão e confiabilidade à suas consultas. </li>

    <li> Ainda que empregando os melhores esforços, se isenta de qualquer responsabilidade
        pela eventual não inclusão de algum dado do veículo em razão de atraso ou falta de
        encaminhamento dos dados em qualquer uma das consultas oferecidas.
    </li>

    <li> Não garante a procedência do veículo e que as bases consultadas possuam 100% das
        informações cadastradas, se limitando a apresentar as informações obtidas nas bases
        consultadas.
    </li>
</ul>

</body>
</html>
