@extends('agenda.layout')

@section('titulo','Listar Usuários')

@section('conteudo')

<!--CONSULTA(search bar)-->
<table>
<tr><td><b>ID</b></td><td><b>Nome</b></td><td><b>Telefone</b></td><td><b>E-mail</b></td><td><b>Detalhes</b></td><td><b>Alterar</b></td><td><b>Excluir</b></td></tr>
<?php
    //var_dump($_SESSION)
    if (isset($_SESSION['users'])){
      foreach ($_SESSION['users'] as $dados) {
        //var_dump($_SESSION['users']);
        echo "<tr><td>{$dados['id']}</td>".
             "<td>{$dados['name']}</td>".
             "<td>{$dados['phone']}</td>".
             "<td>{$dados['email']}</td>";?>
             <td><a href="{{ route('agenda.show',$dados['id']) }}"><button>Detalhes</button></a></td>
             <td><a href="{{ route('agenda.edit',$dados['id']) }}"><button>Editar</button></a></td>
             <td><form id="form_delete" name="form_delete" action="{{ route('agenda.destroy',$dados['id']) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este registro?')">
                @method('DELETE')
                @csrf
                <button type="submit">Excluir</button>
            </form></td></tr><?php
      }
    }
?>    
</table>
@endsection