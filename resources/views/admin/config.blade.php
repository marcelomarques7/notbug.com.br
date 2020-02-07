@extends('layouts.admin')

@section('title', 'Configurações')

@section('content')

    <h1>Configurações...</h1>

    Olá, {{ $nome }} - <a href="logout">Sair</a>    

 

    @alert
        Alguma frase qualquer...
    @endalert

    Meu nome é {{ $nome }}. Eu tenho {{$idade}} anos.<br/>
    <hr/>

    @for($q=1;$q<=10;$q++)
        O valor é {{$q}}<br/>
    @endfor
    <hr/>
        @if (count($lista)>0)
            Lista do bolo:
            <ul>
                @foreach ($lista as $item)
                    <li>{{$item['nome']}} - {{$item['qt']}}</li>    
                @endforeach
            </ul>
        @else
            Não há ingredientes.
        @endif
        

    <hr/>

    @if($idade > 18 && $idade <= 60)
        Eu sou um adulto.
    @elseif($idade >60 && $idade <=120)
        Eu sou um idoso.
    @else
        Eu sou MENOR de idade
    @endif

    @isset($versao)
        Existe uma versão e é a {{$versao}}
    @endisset

    @empty($cidade)
        Não existe uma cidade.
    @endempty

    @if($showform)
        <form method="POST">

            @csrf

            Nome:<br/>
            <input type="text" name="nome" /><br/>

            Idade:<br/>
            <input type="text" name="idade" /><br/>

            Cidade:<br/>
            <input type="text" name="cidade" /><br/>

            <input type="submit" value="Enviar" /><br/>

        </form>
    @endif
@endsection