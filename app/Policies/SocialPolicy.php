<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Social;
use Illuminate\Auth\Access\HandlesAuthorization;

class SocialPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the social.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Social  $social
     * @return mixed
     */
    public function view(User $user, Social $social)
    {
        // Update $user authorization to view $social here.
        return true;
    }

    /**
     * Determine whether the user can create social.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Social  $social
     * @return mixed
     */
    public function create(User $user, Social $social)
    {
        // Update $user authorization to create $social here.
        return true;
    }

    /**
     * Determine whether the user can update the social.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Social  $social
     * @return mixed
     */
    public function update(User $user, Social $social)
    {
        // Update $user authorization to update $social here.
        return true;
    }

    /**
     * Determine whether the user can delete the social.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Social  $social
     * @return mixed
     */
    public function delete(User $user, Social $social)
    {
        // Update $user authorization to delete $social here.
        return true;
    }
}
