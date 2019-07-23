<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProvaQuestao extends Model
{
    protected  $table = 'prova_questao';

    public function questoes()
    {
        return $this->hasMany(Questao::class, 'id');
    }

    public function respostas()
    {
        return $this->hasMany(Resposta::class);
    }
}
