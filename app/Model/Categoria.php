<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  protected $fillable = [
    'descricao', 'icone', 'usuarioAtualizacao',
  ];

    public function cursos() {
        return $this->hasMany(Curso::class);
    }
}
