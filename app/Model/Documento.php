<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Model\TipoDocumento;

class Documento extends Model
{
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
