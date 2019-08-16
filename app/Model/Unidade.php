<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Unidade extends Model
{
    public function materiais()
    {
        return $this->hasMany(UnidadeMaterial::class);
    }

    public function usuario() {
        return $this->belongsToMany(User::class, 'usuario_curso_unidade_material_prova')->withPivot('dataConclusao', 'notaAval');
    }

    public function questoes()
    {
        return $this->hasMany(Questao::class);
    }

    public function provas()
    {
        return $this->hasMany(Prova::class);
    }
}
