<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/','HomeController');
//Route::redirect('/', '/teste'); //redirecionamento

//Route::get('/teste', function(){
//    return view('teste');
//});
Route::view('/teste', 'teste');

Route::prefix('/tarefas')->group(function(){

    Route::get('/', 'TarefasController@list');    //LISTAGEM DE TAREFAS

    Route::get('add', 'TarefasController@add');  //Tela de adição de nova tarefa
    Route::post('add', 'TarefasController@addAction'); //Ação de adição de nova tarefa

    Route::get('edit/{id}', 'TarefasController@edit'); // Tela de edição
    Route::post('edit/{id}', 'TarefasController@editAction');   //Ação de edição

    Route::get('delete/{id}', 'TarefasController@del'); //Ação de deletar

    Route::get('marcar/{id}', 'TarefasController@done'); //Marcar resolvido/não.


});

Route::get('noticia/{slug}', function($slug){

    echo "Slug: ".$slug;

});

Route::get('/noticia/{slug}/comentario/{id}', function($slug, $id){
    echo "Mostrando o comentário ".$id." da noticia ".$slug;
});

// DISTINGUIR ROTAS, COM EXPRESSÃO REGULAR
Route::get('/user/{name}', function($name){
    echo "Mostrando usuario de NOME ".$name;
})->where('name', '[a-z]+');

Route::get('/user/{id}', function($id){
    echo "Mostrando usuario ID ".$id;
}); //provider padrão no id em RouteServiceProvider.php



//AGRUPAR GRUPOS DE ROTAS
Route::prefix('/config')->group(function(){

    Route::get('/', 'Admin\ConfigController@index'); //CAMINHO CORRETO DO CONTROLLER NA PASTA ADMIN
    Route::post('/', 'Admin\ConfigController@index');

    Route::get('info', 'Admin\ConfigController@info');
    Route::get('permissoes', 'Admin\ConfigController@permissoes');

});


Route::fallback(function(){
    return view('404');
});