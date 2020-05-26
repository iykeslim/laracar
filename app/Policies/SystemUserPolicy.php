<?php

namespace App\Policies;

use App\Models\SystemUsers;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SystemUserPolicy
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
        return hash_equals($user->systemuser->role,'administrador');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\SystemUsers  $systemUsers
     * @return mixed
     */
    public function view(User $user, SystemUsers $systemUsers)
    {
        return hash_equals($user->systemuser->role,'administrador') ? true : $user->id == $systemUsers->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return hash_equals($user->systemuser->role,'administrador');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\SystemUsers  $systemUsers
     * @return mixed
     */
    public function update(User $user, SystemUsers $systemUsers)
    {
        return hash_equals($user->systemuser->role,'administrador') ? true : $user->id == $systemUsers->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\SystemUsers  $systemUsers
     * @return mixed
     */
    public function delete(User $user, SystemUsers $systemUsers)
    {
        return hash_equals($user->systemuser->role,'administrador');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\SystemUsers  $systemUsers
     * @return mixed
     */
    public function restore(User $user, SystemUsers $systemUsers)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\SystemUsers  $systemUsers
     * @return mixed
     */
    public function forceDelete(User $user, SystemUsers $systemUsers)
    {
        //
    }
}
