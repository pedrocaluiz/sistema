<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UnidadeMaterial extends Model
{
    protected  $table = 'unidade_materiais';

    public function usuario() {
        return $this->belongsToMany(User::class, 'usuario_curso_unidade_material_prova', 'material_id')->withPivot('dataConclusao');
    }

    public function unidade() {
        return $this->belongsTo(Unidade::class);
    }

    public function tipoMaterial() {
        return $this->belongsTo(TipoMaterial::class);
    }

}
