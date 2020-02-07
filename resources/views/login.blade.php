@extends('layouts.admin')

@section('title', 'Login')

@section('content')
    
    @if(session('warning'))
        @alert
            {{ session('warning') }}
        @endalert
    @endif

    @lang('messages.test')

    <form method="POST">
        @csrf
        <input type="email" name="email" placeholder="Digite um e-mail"><br>
        <input type="password" name="password" placeholder="Digite uma senha"><br>


        @if($tries >= 3)
            @lang('messages.tryerror', ['count' => 3])
        @else
            <input type="submit" value="Enviar">
        @endif        
    </form>
    Tentativas: {{ $tries }} <br>
    <a href="register">Cadastrar-se</a>

@endsection