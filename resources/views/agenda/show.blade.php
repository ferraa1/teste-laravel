@extends('agenda.layout')

@section('titulo','Detalhes do Usuário')

@section('conteudo')
        <label for="id">ID</label>
        <input type="text" name="id" id="id" value="{{ $dados['id'] }}" disabled><br>
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" value="{{ $dados['name'] }}" disabled><br>
        <label for="phone">Telefone</label>
        <input type="text" name="phone" id="phone" value="{{ $dados['phone'] }}" disabled><br>
        <label for="email">E-mail</label>
        <input type="text" name="email" id="email" value="{{ $dados['email'] }}" disabled><br>
        <a href="{{ route('agenda.edit',$dados['id']) }}"><button>Editar</button></a></td>
@endsection