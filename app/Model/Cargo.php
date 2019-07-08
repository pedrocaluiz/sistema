<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $fillable = [
        'descricao', 'salarioBase', 'usuarioAtualizacao',
    ];
}
