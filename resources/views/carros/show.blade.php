@extends('layout')

@section('cabecalho')
    Show Carro
@endsection

@section('conteudo')
@include('erros', ['errors' => $errors])

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

        
        <div class="row form-group">
            <div class="col-md-12">
                <a href="{{ route('index')}} "class="btn btn-primary float-right mx-1">Voltar</a>	
            </div>										
        </div>
    </form>

    
</div>
@endsection