<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    public function materiais()
    {
        return $this->hasMany(UnidadeMaterial::class);
    }

    public function usuario() {
        return $this->belongsToMany(User::class, 'usuario_curso_unidade_materiais')->withPivot('dataConclusao');

    }

    public function questoes()
    {
        return $this->hasMany(Questao::class);
    }
}
