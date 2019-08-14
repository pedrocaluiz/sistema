<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    public $timestamps = false;

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}
