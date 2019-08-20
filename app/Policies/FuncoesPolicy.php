<?php

namespace App\Policies;

use App\User;
use App\Model\Funcao;
use Illuminate\Auth\Access\HandlesAuthorization;

class FuncoesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the agencia.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function administrador()
    {
        return false;
    }
}
