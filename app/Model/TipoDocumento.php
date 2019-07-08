<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $fillable = [
        'descricao', 'siglaDocumento', 'usuarioAtualizacao',
    ];
}
