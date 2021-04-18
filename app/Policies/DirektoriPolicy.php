<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Direktori;
use Illuminate\Auth\Access\HandlesAuthorization;

class DirektoriPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the direktori.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Direktori  $direktori
     * @return mixed
     */
    public function view(User $user, Direktori $direktori)
    {
        // Update $user authorization to view $direktori here.
        return true;
    }

    /**
     * Determine whether the user can create direktori.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Direktori  $direktori
     * @return mixed
     */
    public function create(User $user, Direktori $direktori)
    {
        // Update $user authorization to create $direktori here.
        return true;
    }

    /**
     * Determine whether the user can update the direktori.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Direktori  $direktori
     * @return mixed
     */
    public function update(User $user, Direktori $direktori)
    {
        // Update $user authorization to update $direktori here.
        return true;
    }

    /**
     * Determine whether the user can delete the direktori.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Direktori  $direktori
     * @return mixed
     */
    public function delete(User $user, Direktori $direktori)
    {
        // Update $user authorization to delete $direktori here.
        return true;
    }
}
