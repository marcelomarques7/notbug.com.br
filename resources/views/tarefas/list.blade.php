@extends('layouts.admin')

@section('title', 'Listagem de tarefas')

@section('content')
    <h1>Listagem</h1>

    <a href="">Adicionar nova tarefa</a>

    @if (count($list) > 0)
        <ul>
            @foreach ($list as $item)                
                <li>
                    <a href="">[ @if($item->resolvido===1) desmarcar @else marcar @endif ]</a>
                    {{$item->titulo}}
                    <a href="">Editar</a>
                    <a href="">Excluir</a>
                </li>
            @endforeach
        </ul>
    @else
        Não há itens a serem listados.
    @endif
@endsection