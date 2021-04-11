<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Siring;
use Illuminate\Auth\Access\HandlesAuthorization;

class SiringPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the siring.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Siring  $siring
     * @return mixed
     */
    public function view(User $user, Siring $siring)
    {
        // Update $user authorization to view $siring here.
        return true;
    }

    /**
     * Determine whether the user can create siring.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Siring  $siring
     * @return mixed
     */
    public function create(User $user, Siring $siring)
    {
        // Update $user authorization to create $siring here.
        return true;
    }

    /**
     * Determine whether the user can update the siring.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Siring  $siring
     * @return mixed
     */
    public function update(User $user, Siring $siring)
    {
        // Update $user authorization to update $siring here.
        return true;
    }

    /**
     * Determine whether the user can delete the siring.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Siring  $siring
     * @return mixed
     */
    public function delete(User $user, Siring $siring)
    {
        // Update $user authorization to delete $siring here.
        return true;
    }
}
