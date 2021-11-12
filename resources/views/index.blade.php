@extends('layout')


@section('cabecalho')
    Carros
@endsection

@section('conteudo')

@include('mensagem', ['mensagem' => $mensagem])

    <div id="centro-div" class="container mt-5">
        <h3 id="titulo">Consulta Carro</h3>
        <form action="{{ route('consult') }}" method="post">
        @csrf
                <div class="row form-group">
                    <div class="col-md-12 mt-2">
                        <label for="placa">Placa</label>
                        <input type="text" class="form-control valores" id="placa" name="placa">
                    </div>												
                </div>
                <div class="row form-group">
                    <div class="col-md-12"> 
                        <button class="btn btn-success float-right mx-1">Consultar</button>	
                        <a href="{{ route('form_criar_carro') }}" class="btn btn-primary float-left mx-1">Novo</a>		
                    </div>											
                </div>	
            </form >
    
    <table class="table mt-5">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Placa</th>
                <th scope="col">Descrição</th>
                <th scope="col">Lugar</th>
                <th scope="col">Ano</th>
                <th scope="col">Chassi</th>
                <th scope="row"></th>
                <th scope="row"></th>
                <th scope="row"></th>
            </tr>
        </thead>
        <tbody>
        
        @foreach($carros as $car)	
           <tr>
                <td> {{ $car->placa }} </td>
                <td > {{ $car->descricao }} </td>	
                <td > {{ $car->lugar}} </td>	
                <td > {{ $car->ano }} </td>		
                <td > {{ $car->chassi }} </td>
                <td>
                    <a class='btn btn-primary ' href="/carros/show/{{ $car->cdCarro }}">
                        <i class="fas fa-print"></i>
                    </a>
                    
                </td>
                
                <td>
                    <a class='btn btn-success ' href="/carros/edit/{{ $car->cdCarro }}">
                        <i class="far fa-edit"></i>
                    </a>
                </td>
                
                <td>
                    <form method="post" action="/carros/{{ $car->cdCarro }}" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($car->placa) }}?')">
                    @csrf
                    @method('DELETE')
                        <button class="btn btn-danger ">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>  
                </td>
            </tr>						
        
        @endforeach
        
        </tbody>
    </table>
    </div>
@endsection