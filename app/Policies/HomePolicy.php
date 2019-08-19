<?php

namespace App\Policies;

use App\User;
use App\Home;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class HomePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the home.
     *
     * @param  \App\User  $user
     * @param  \App\Home  $home
     * @return mixed
     */
    public function view(User $user)
    {
       return false;
    }

    /**
     * Determine whether the user can create homes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the home.
     *
     * @param  \App\User  $user
     * @param  \App\Home  $home
     * @return mixed
     */
    public function update(User $user, Home $home)
    {
        //
    }

    /**
     * Determine whether the user can delete the home.
     *
     * @param  \App\User  $user
     * @param  \App\Home  $home
     * @return mixed
     */
    public function delete(User $user, Home $home)
    {
        //
    }

    /**
     * Determine whether the user can restore the home.
     *
     * @param  \App\User  $user
     * @param  \App\Home  $home
     * @return mixed
     */
    public function restore(User $user, Home $home)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the home.
     *
     * @param  \App\User  $user
     * @param  \App\Home  $home
     * @return mixed
     */
    public function forceDelete(User $user, Home $home)
    {
        //
    }
}
