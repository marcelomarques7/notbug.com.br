<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    
    // CASO A TABELA NÃO SEJA O NOME DO MODEL NO PLURAL
    // protected $table = 'tarefas';
    // CASO A CHAVE PRIMARIA NÃO FOR ID
    // protected $primaryKey = 'id';
    // CASO A CHAVE NÃO FOR AUTO INCREMENTI por padrão ele assume que é
    // public $incrementing = false;
    // DEFINIR O TIME DE DADO DA CHAVE, POR PADRÃO ELE PÕE INTEIRO
    // protected $keyType = 'string';

    // created_at, updated_at ELE ASSUME QUE TEM ESSAS 2 COLUNAS NO BANCO
    public $timestamps = false;
    // CASO TENHA ESSES CAMPOS QUE NOME DIFERENTE
    // const CREATED_AT = 'date_created';
    // const UPDATED_AT = 'date_updated';

    // PERMITIR ALTERAÇÃO EM MASSA
    protected $fillable = ['titulo'];
}
