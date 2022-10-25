@extends('agenda.layout')

@section('titulo','Editar Usuários')

@section('conteudo')
    <form action="{{ route('agenda.update',$dados['id']) }}" method="post">

        @method("PATCH")
        @csrf

        @include('agenda.form')

    </form>
@endsection