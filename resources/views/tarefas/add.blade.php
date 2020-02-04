@extends('layouts.admin')

@section('title', 'Adição de tarefas')

@section('content')
    <h1>Adição</h1>

    @if(session('warning'))
        @alert
            {{ session('warning') }}
        @endalert
    @endif

    <form method="POST">
        @csrf
        <label>
            Titulo:<br>
            <input type="text" name="titulo">
        </label>
        <input type="submit" value="Adicionar">
    </form>
@endsection