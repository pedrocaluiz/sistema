<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Agencia extends Model
{
    protected $fillable = [
        'codigoUnidade', 'descricao', 'SR', 'DIRE', 'usuarioAtualizacao',
    ];
}
