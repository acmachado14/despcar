@extends('layout')


@section('cabecalho')
    Debitos
@endsection

@section('conteudo')

@include('mensagem', ['mensagem' => $mensagem])


@endsection