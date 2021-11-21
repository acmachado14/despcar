@extends('carros.show')

@section('cabecalho')
Carros
@endsection

@section('conteudo')

@include('mensagem', ['mensagem' => $mensagem])