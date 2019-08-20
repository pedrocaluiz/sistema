<?php

namespace App\Policies;

use App\User;
use App\Model\UnidadeMaterial;
use Illuminate\Auth\Access\HandlesAuthorization;

class MateriaisPolicy
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

    /**
     * Determine whether the user can view the unidade material.
     *
     * @param  \App\User  $user
     * @param  \App\Model\UnidadeMaterial  $unidadeMaterial
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
     * Determine whether the user can create unidade materials.
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
     * Determine whether the user can update the unidade material.
     *
     * @param  \App\User  $user
     * @param  \App\Model\UnidadeMaterial  $unidadeMaterial
     * @return mixed
     */
    public function update(User $user, UnidadeMaterial $unidadeMaterial)
    {
        foreach ($user->perfil as $perfil){
            if (($perfil->descricao == "Instrutor") && ($user->id == $unidadeMaterial->usuarioAtualizacao)){
                return true;
            }
        }
    }

    /**
     * Determine whether the user can delete the curso.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Curso  $curso
     * @return mixed
     */
    public function delete(User $user, UnidadeMaterial $unidadeMaterial)
    {
        foreach ($user->perfil as $perfil){
            if (($perfil->descricao == "Instrutor") && ($user->id == $unidadeMaterial->usuarioAtualizacao)){
                return true;
            }
        }
    }

}
