@extends('layout')

@section('cabecalho')
    Carro: {{ $carro->placa }}
@endsection

@section('conteudo')

@include('erros', ['errors' => $errors])

@include('mensagem', ['mensagem' => $mensagem])

<div class="container">
        <form>
        @csrf
		<div class="row form-group">
            <div class="col-md-4">
                <label for="Placa">Placa</label>
                    <input type="text" class="form-control" value="{{ $carro->placa }}" id="placa" name="placa" readonly>
                </div>
                <div class="col-md-4">
                    <label for="Descrição">Descrição</label>
                    <input type="text" class="form-control" value="{{ $carro->descricao }}" id="descricao" name="descricao" readonly>
                </div>
                <div class="col-md-4">
                    <label for="ano">Ano</label>
                    <input type="text" class="form-control" id="ano" name="ano" value="{{ $carro->ano }}" readonly>
                </div>												
            </div>

        <div class="row form-group">
            <div class="col-md-4">
                <label for="chassi">Chassi</label>
                    <input type="text" class="form-control" id="chassi" name="chassi" value="{{ $carro->chassi }}" readonly>
                </div>	
                <div class="col-md-4">
                    <label for="combustivel">Tipo do Combustivel</label>
                    <input type="text" class="form-control" id="combustivel" name="combustivel" value="{{ $carro->combustivel }}" readonly>
                </div>
                <div class="col-md-4">
                    <label for="lugar">Origem</label>
                    <input type="text" class="form-control" id="lugar" name="lugar" value="{{ $carro->lugar }}" readonly>
                </div>											
            </div>  	
        <div>


        <div class="row form-group">
            <div class="col-md-4">
                <label for="Placa">Leilao</label>
                <input type="text" class="form-control" value="{{ $carro->leilao }}" id="leilao" name="leilao" readonly>
            </div>
            <div class="col-md-4">
                <label for="Descrição">Remark</label>
                <input type="text" class="form-control" value="{{ $carro->remark }}" id="remark" name="remark" readonly>
            </div>
            <div class="col-md-4">
                <label for="ano">Descrição do Leilao</label>
                <input type="text" class="form-control" id="descLeilao" name="descLeilao" value="{{ $carro->descLeilao }}" readonly>
            </div>					
        </div>

        <table class="table mt-5">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Tipo</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Valor</th>
                    <th scope="row"></th>
                    <th scope="row"></th>
                </tr>
            </thead>
            <tbody>
            
            @foreach($debitos as $debito)	
            <tr>
                    <td> {{ $debito->tipo }} </td>
                    <td > {{ $debito->descricao }} </td>	
                    <td > {{ $debito->valor}} </td>	
                                
                    <td>
                        <a class='btn btn-success ' href="/debitos/edit/{{ $debito->cdDebito }}">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    
                    <td>
                        <form method="post" action="/debitos/{{ $debito->cdDebito }}" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($debito->descricao) }}?')">
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



    </form>

    
</div>
@endsection