<?php

namespace App\Policies;

use App\User;
use App\Model\Questao;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestoesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the questao.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Questao  $questao
     * @return mixed
     */
    public function view(User $user)
    {
        //dd($user->perfil[0]);
        foreach ($user->perfil as $perfil){
            if ($perfil->descricao == "Instrutor"){
                return true;
            }
        }
    }

    /**
     * Determine whether the user can create questaos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the questao.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Questao  $questao
     * @return mixed
     */
    public function update(User $user, Questao $questao)
    {
        foreach ($user->perfil as $perfil){
            if (($perfil->descricao == "Instrutor") && ($user->id == $questao->usuarioAtualizacao)){
                return true;
            }
        }
    }

    /**
     * Determine whether the user can delete the questao.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Questao  $questao
     * @return mixed
     */
    public function delete(User $user, Questao $questao)
    {
        //
    }

    /**
     * Determine whether the user can restore the questao.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Questao  $questao
     * @return mixed
     */
    public function restore(User $user, Questao $questao)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the questao.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Questao  $questao
     * @return mixed
     */
    public function forceDelete(User $user, Questao $questao)
    {
        //
    }
}
