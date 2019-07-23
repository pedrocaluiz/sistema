<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Prova extends Model
{
    public function questoes() {
        return $this->belongsToMany(Questao::class, 'prova_questao', 'questao_id');
    }

    public function respostas() {
        return $this->belongsToMany(Resposta::class, 'prova_questao');
    }
}
