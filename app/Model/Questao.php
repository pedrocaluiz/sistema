<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Questao extends Model
{
    protected  $table = 'questoes';

    public function respostas()
    {
        return $this->hasMany(Resposta::class);
    }

    public function prova() {
        return $this->belongsToMany(Prova::class, 'prova_questao', 'questao_id')->withPivot('dataConclusao');
    }
}
