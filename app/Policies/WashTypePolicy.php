<?php

namespace App\Policies;

use App\Models\WashType;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class WashTypePolicy
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
        return !is_null($user->systemuser);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\WashType  $washType
     * @return mixed
     */
    public function view(User $user, WashType $washType)
    {
        return !is_null($user->systemuser);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return !is_null($user->systemuser);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\WashType  $washType
     * @return mixed
     */
    public function update(User $user, WashType $washType)
    {
        return !is_null($user->systemuser);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\WashType  $washType
     * @return mixed
     */
    public function delete(User $user, WashType $washType)
    {
        return !is_null($user->systemuser);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\WashType  $washType
     * @return mixed
     */
    public function restore(User $user, WashType $washType)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\WashType  $washType
     * @return mixed
     */
    public function forceDelete(User $user, WashType $washType)
    {
        //
    }
}
