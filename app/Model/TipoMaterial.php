<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TipoMaterial extends Model
{
    protected  $table = 'tipo_materiais';

    public $timestamps = false;

    protected $fillable = [
        'descricao', 'icone', 'usuarioAtualizacao',
    ];
}
