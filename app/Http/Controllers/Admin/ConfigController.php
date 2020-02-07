<?php

namespace App\Http\Controllers\Admin; //ARRUMAR O CAMINHO

use App\Http\Controllers\Controller; //IMPORTA O CONTROLLER
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ConfigController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
    //    $estado = '';
    //    if($request->missing('estado')){            
            $estado = 'SP';
    //    } else {
    //        $estado = $request->input('estado');
    //    }

        $user = Auth::user(); //PEGAR O USUARIO LOGADO, ASSIM OU ASSIM ABAIXO
        //$user = $request->user();

        
        $estado = $request->input('estado', 'SP'); //forma resumida do código comentado acima
        $nome = $request->input('nome', 'Visitante');
        $method = $request->method();

        $cidade = $request->input('cidade');

        $lista = [
            ['nome'=>'Farinha', 'qt' => '2'],
            ['nome'=>'Ovo', 'qt' => '4'],
            ['nome'=>'Água', 'qt' => '2'],
            ['nome'=>'Fermento', 'qt' => '1']
        ];


        $nome2 = $user->name;
        $idade2 = 26;
        $data = [
            'nome' => $nome2,
            'idade' => $idade2,
            'cidade' => $cidade,
            'lista' => $lista,
            'showform' => Gate::allows('see-form')
        ];

        //$dados = $request->only(['nome','idade']); //pegar apenas o que quer do formulario
        //$dados = $request->except(['_token']); //pegar todos menos o que eu escolher ali
        //print_r($dados);
        echo "Meu nome é: ".$nome." e o metodo foi ".$method;

        return view('admin.config', $data);
    }   

    public function info() {
        echo "Configurações INFO 3";
    }

    public function permissoes() {
        echo "Configurações PERMISSÕES 3";
    }

}
