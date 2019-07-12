<?php

namespace App\Policies;

use App\User;
use App\Model\Curso;
use Illuminate\Auth\Access\HandlesAuthorization;

class CursosPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the curso.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Curso  $curso
     * @return mixed
     */
    public function view(User $user)
    {
        dd($user->perfil[0]->descricao);
        foreach ($user->perfil as $perfil){
            if ($perfil->descricao == "Instrutor"){
                return true;
            }
        }
    }

    /**
     * Determine whether the user can create cursos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //dd($user->perfil[0]->descricao);
        foreach ($user->perfil as $perfil){
            if ($perfil->descricao == "Instrutor"){
                return true;
            }
        }
    }

    /**
     * Determine whether the user can update the curso.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Curso  $curso
     * @return mixed
     */
    public function update(User $user, Curso $curso)
    {
        foreach ($user->perfil as $perfil){
            if (($perfil->descricao == "Instrutor") && ($user->id == $curso->usuarioAtualizacao)){
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
    public function delete(User $user, Curso $curso)
    {
        foreach ($user->perfil as $perfil){
            if (($perfil->descricao == "Instrutor") && ($user->id == $curso->usuarioAtualizacao)){
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
    public function matriculado(User $user, Curso $curso)
    {
        $matriculas = $curso->usuario;
        foreach ($matriculas as $matricula){
            if (isset($matricula) && $matricula->id == $user->id){
                return true;
            }
        }
    }
}
