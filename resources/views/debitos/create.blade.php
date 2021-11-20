@extends('layout')

@section('cabecalho')
    Adicionar Debito
@endsection

@section('conteudo')
@include('erros', ['errors' => $errors])

<div class="container">
        <form method="post">
        @csrf
		<div class="row form-group">
            <div class="col-md-4">
                <label for="tipo">Tipo</label>
                <input type="text" class="form-control" value="" id="tipo" name="tipo">
            </div>

            <div class="col-md-4">
                <label for="valor">Valor</label>
                <input type="number" class="form-control" value="" id="valor" name="valor" >
            </div>

            <div class="col-md-4">
                <label for="cdCarro">Carro</label>
                <select id="cdCarro" name="cdCarro" class="form-control">
                    @foreach($carros as $carro)
                        <option value="{{ $carro->cdCarro }}" > {{ $carro->placa }} </option>
                    @endforeach
                </select>
            </div>		
            				
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <label for="descricao">Descrição </label>
                <input type="text" class="form-control" id="descricao" name="descricao" value="" >
            </div>			
        </div>  
        

          <div class="row form-group">
              <div class="col-md-12">
                  <button class="btn btn-success float-right mx-1">Salvar</button>	
              </div>										
          </div>
    </form >
</div>
@endsection