@extends('agenda.layout')

@section('titulo','Inserir Usuários')

@section('conteudo')
    <form action="{{ route('agenda.store')}}" method="post">

        @method("POST")
        @csrf

        @include('agenda.form')

    </form>
@endsection