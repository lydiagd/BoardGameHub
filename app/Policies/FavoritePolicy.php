<?php

namespace App\Policies;

use App\Models\User;
use App\Models\favorite;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class FavoritePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\favorite  $favorite
     * @return mixed
     */
    public function view(User $user, favorite $favorite)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->id > 0;
        // return FALSE;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\favorite  $favorite
     * @return mixed
     */
    public function update(User $user, favorite $favorite)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\favorite  $favorite
     * @return mixed
     */
    public function delete(User $user, favorite $favorite)
    {
        return $user->id === $favorite->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\favorite  $favorite
     * @return mixed
     */
    public function restore(User $user, favorite $favorite)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\favorite  $favorite
     * @return mixed
     */
    public function forceDelete(User $user, favorite $favorite)
    {
        //
    }
}
