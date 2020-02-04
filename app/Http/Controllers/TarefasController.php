<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tarefa;

class TarefasController extends Controller
{
    
    public function list() {
        // $list = DB::select('SELECT * FROM tarefas');
        $list = Tarefa::all();

        return view('tarefas.list', [
            'list' => $list
        ]);
    }

    public function add() {
        return view('tarefas.add');
    }

    public function addAction(Request $request) {
        $request->validate([
            'titulo' => [ 'required', 'string' ]
        ]);
        
        $titulo = $request->input('titulo');

        /*DB::insert('INSERT INTO tarefas (titulo) VALUES (:titulo)', [
            'titulo' => $titulo
        ]);*/

        $tarefa = new Tarefa;
        $tarefa->titulo = $titulo;
        $tarefa->save();

        return redirect()->route('tarefas.list');

    }

    public function edit($id) {
        /*$data = DB::select('SELECT * FROM tarefas WHERE id = :id',[
            'id' => $id
        ]);*/
        $data = Tarefa::find($id);
    

        if($data){
            return view('tarefas.edit',[
                'data' => $data
            ]);
        } else {
            return redirect()->route('tarefas.list');
        }
    }

    public function editAction(Request $request, $id) {
        $request->validate([
            'titulo' => [ 'required', 'string' ]
        ]);

        $titulo = $request->input('titulo');
      
        /*DB::update('UPDATE tarefas SET titulo = :titulo WHERE id = :id',[
            'id' => $id,
            'titulo' => $titulo
        ]);*/
        // UMA FORMA DE ELOQUENT
        /*$tarefa = Tarefa::find($id);
        $tarefa->titulo = $titulo;
        $tarefa->save();*/
        // OUTRA FORMA COM ELOQUENT
        Tarefa::find($id)->update(['titulo'=>$titulo]);

        return redirect()->route('tarefas.list');
    }

    public function del($id) {
        /*DB::delete('DELETE FROM tarefas WHERE id = :id',[
            'id' => $id
        ]);*/

        Tarefa::find($id)->delete();

        return redirect()->route('tarefas.list');
    }

    public function done($id) {
        // opção 1: select + update
        // opção 2: update matemático ÉSSA!
        //  LOGICO DA OPÇÃO 2
            // ORIGINAL 0
            // 1 - 0 = 1

            // ORIGINAL 1
            // 1 - 1 = 0

        /*DB::update('UPDATE tarefas SET resolvido = 1 - resolvido WHERE id = :id',[
            'id' => $id
        ]);*/
        $tarefa = Tarefa::find($id);
        // VERIFICAR DE A ID EXISTE COM ESTE IF
        if($tarefa){
            $tarefa->resolvido = 1 - $tarefa->resolvido;
            $tarefa->save();
        }
        
        return redirect()->route('tarefas.list');
    }
    
}
