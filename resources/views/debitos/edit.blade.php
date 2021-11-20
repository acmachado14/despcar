@extends('layout')

@section('cabecalho')
Editar Debito
@endsection

@section('conteudo')
@include('erros', ['errors' => $errors])

<div class="container">
    <form method="post">
        @csrf
        <div class="row form-group">

            <label for="cdDebito"></label>
            <input type="hidden" class="form-control" value="{{ $debito->cdDebito }}" id="cdDebito" name="cdDebito" >

            <div class="col-md-4">
                <label for="tipo">Tipo</label>
                <input type="text" class="form-control" value="{{ $debito->tipo }}" id="tipo" name="tipo">
            </div>

            <div class="col-md-4">
                <label for="valor">Valor</label>
                <input type="number" class="form-control" value="{{ $debito->valor }}" id="valor" name="valor">
            </div>


            <div class="col-md-4">
                <label for="cdCarro">Carro</label>
                <input type="text" class="form-control" value="{{ $carro->cdCarro }}" id="cdCarro" name="cdCarro" readonly>
            </div>


        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <label for="descricao">Descrição </label>
                <input type="text" class="form-control" id="descricao" name="descricao" value="{{ $debito->descricao }}">
            </div>
        </div>


        <div class="row form-group">
            <div class="col-md-12">
                <button class="btn btn-success float-right mx-1">Salvar</button>
            </div>
        </div>
    </form>
</div>
@endsection