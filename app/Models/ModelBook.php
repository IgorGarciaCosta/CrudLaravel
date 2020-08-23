<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelBook extends Model
{
    protected $table = 'book'; 
    public function relUsers(){
        //um livro tem um autor. endereço
        //a foreign_key da tabela User
        //a local_key da tabela User
        return $this->hasOne('App\User', 'id', 'id_user');
    }
}


