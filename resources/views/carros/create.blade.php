@extends('layout')

@section('cabecalho')
    Adicionar Carro
@endsection

@section('conteudo')
@include('erros', ['errors' => $errors])

<div class="container">
        <form method="post">
        @csrf
		<div class="row form-group">
              <div class="col-md-4">
                    <label for="Placa">Placa</label>
                        <input type="text" class="form-control" value="" id="placa" name="placa">
                    </div>
                    <div class="col-md-4">
                        <label for="Descrição">Descrição</label>
                        <input type="text" class="form-control" value="" id="descricao" name="descricao" >
                    </div>
                    <div class="col-md-4">
                        <label for="ano">Ano</label>
                        <input type="text" class="form-control" id="ano" name="ano" value="" >
                    </div>												
				</div>
          <div class="row form-group">
              <div class="col-md-4">
                    <label for="chassi">Chassi</label>
                        <input type="text" class="form-control" id="chassi" name="chassi" value="" >
                    </div>	
                    <div class="col-md-4">
                        <label for="combustivel">Tipo do Combustivel</label>
                        <input type="text" class="form-control" id="combustivel" name="combustivel" value="" >
                    </div>
                    <div class="col-md-4">
                        <label for="lugar">Origem</label>
                        <input type="text" class="form-control" id="lugar" name="lugar" value="" >
                    </div>											
                </div>  	
          <div>

          <div class="row form-group">
              <div class="col-md-12">
                  <button class="btn btn-success float-right mx-1">Salvar</button>	
              </div>										
          </div>
    </form >
</div>
@endsection