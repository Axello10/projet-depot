<?php

namespace App\Policies;

use App\Models\Entrie;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EntriePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->role_id === 1 || $user->role_id === 2;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Entrie  $entrie
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Entrie $entrie)
    {
        return $user->role_id === 1 || $user->role_id === 2 || $user->id === $entrie->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Entrie  $entrie
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Entrie $entrie)
    {
        return $user->role_id === 1 || $user->id === $entrie->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Entrie  $entrie
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Entrie $entrie)
    {
        return $user->role_id === 1;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Entrie  $entrie
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Entrie $entrie)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Entrie  $entrie
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Entrie $entrie)
    {
        //
    }
}
