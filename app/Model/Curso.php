<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    public function usuario() {
        return $this->belongsToMany(User::class, 'usuario_curso_unidade_material_prova');
    }

    public function unidades() {
        return $this->hasMany(Unidade::class);
    }

}
