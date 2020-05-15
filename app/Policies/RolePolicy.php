<?php

namespace App\Policies;

use App\User;
use Silber\Bouncer\Database\Role;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
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
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \Silber\Bouncer\Database\Role  $role
     * @return mixed
     */
    public function view(User $user, Role $role)
    {
        return $user->isAn('admin') || $user->can('view-roles');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAn('admin') || $user->can('create-roles');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \Silber\Bouncer\Database\Role  $role
     * @return mixed
     */
    public function update(User $user, Role $role)
    {
        return $user->isAn('admin') || $user->can('update-roles');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \Silber\Bouncer\Database\Role  $role
     * @return mixed
     */
    public function delete(User $user, Role $role)
    {
        if ($role->name === 'admin')
        {
            return Response::deny('No se puede eliminar este rol');
        }

        return $user->isAn('admin') || $user->can('delete-roles');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \Silber\Bouncer\Database\Role  $role
     * @return mixed
     */
    public function restore(User $user, Role $role)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \Silber\Bouncer\Database\Role  $role
     * @return mixed
     */
    public function forceDelete(User $user, Role $role)
    {
        //
    }
}
