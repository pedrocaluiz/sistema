<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UnidadeMaterial extends Model
{
    protected  $table = 'unidade_materiais';

    public function usuario() {
        return $this->belongsToMany(User::class, 'usuario_curso_unidade_materiais', 'material_id')->withPivot('dataConclusao');
    }

    public function unidade() {
        return $this->belongsTo(Unidade::class);
    }
}
