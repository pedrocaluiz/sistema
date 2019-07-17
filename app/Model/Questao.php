<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Questao extends Model
{
    protected  $table = 'questoes';

    public function respostas()
    {
        return $this->hasMany(Resposta::class);
    }
}
