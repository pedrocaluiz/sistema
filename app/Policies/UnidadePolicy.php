<?php

namespace App\Policies;

use App\User;
use App\Model\Unidade;
use Illuminate\Auth\Access\HandlesAuthorization;

class UnidadePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the unidade.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function view(User $user)
    {
        foreach ($user->perfil as $perfil){
            if ($perfil->descricao == "Instrutor"){
                return true;
            }
        }
    }

    /**
     * Determine whether the user can create unidades.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        foreach ($user->perfil as $perfil){
            if ($perfil->descricao == "Instrutor"){
                return true;
            }
        }
    }

    /**
     * Determine whether the user can update the unidade.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Unidade  $unidade
     * @return mixed
     */
    public function update(User $user, Unidade $unidade)
    {
        foreach ($user->perfil as $perfil){
            if (($perfil->descricao == "Instrutor") && ($user->id == $unidade->usuarioAtualizacao)){
                return true;
            }
        }
    }

    /**
     * Determine whether the user can delete the unidade.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Unidade  $unidade
     * @return mixed
     */
    public function delete(User $user, Unidade $unidade)
    {
        foreach ($user->perfil as $perfil){
            if (($perfil->descricao == "Instrutor") && ($user->id == $unidade->usuarioAtualizacao)){
                return true;
            }
        }
    }
}
