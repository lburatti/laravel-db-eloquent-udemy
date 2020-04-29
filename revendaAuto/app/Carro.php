<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $fillable = [
        'titulo', 'descricao', 'ano', 'valor'
    ];

    public function marca() {
        return $this->belongsTo('App\Marca', 'marca_id');
    }

    public function categorias() {
        return $this->belongsToMany('App\Categoria', 'carro_categoria', 'carro_id', 'categoria_id');
    }

    public function users() {
        return $this->belongsToMany('App\User', 'carro_user', 'carro_id', 'user_id');
    }
}
