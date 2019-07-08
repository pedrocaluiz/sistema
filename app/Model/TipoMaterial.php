<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TipoMaterial extends Model
{
    protected  $table = 'tipo_materiais';

    protected $fillable = [
        'descricao', 'icone', 'usuarioAtualizacao',
    ];
}
