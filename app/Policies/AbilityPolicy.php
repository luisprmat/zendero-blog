<?php

namespace App\Policies;

use App\User;
use Silber\Bouncer\Database\Ability;
use Illuminate\Auth\Access\HandlesAuthorization;

class AbilityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAn('admin');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \Silber\Bouncer\Database\Ability  $ability
     * @return mixed
     */
    public function view(User $user, Ability $ability)
    {
        return $user->isAn('admin') || $user->can('update-abilities');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \Silber\Bouncer\Database\Ability  $ability
     * @return mixed
     */
    public function update(User $user, Ability $ability)
    {
        return $user->isAn('admin') || $user->can('update-abilities');
    }

}
