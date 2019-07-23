<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{

    public function prova()
    {
        return $this->belongsTo(ProvaQuestao::class);
    }
}
