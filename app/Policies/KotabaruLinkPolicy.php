<?php

namespace App\Policies;

use App\Models\User;
use App\Models\KotabaruLink;
use Illuminate\Auth\Access\HandlesAuthorization;

class KotabaruLinkPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the kotabaru_link.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KotabaruLink  $kotabaruLink
     * @return mixed
     */
    public function view(User $user, KotabaruLink $kotabaruLink)
    {
        // Update $user authorization to view $kotabaruLink here.
        return true;
    }

    /**
     * Determine whether the user can create kotabaru_link.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KotabaruLink  $kotabaruLink
     * @return mixed
     */
    public function create(User $user, KotabaruLink $kotabaruLink)
    {
        // Update $user authorization to create $kotabaruLink here.
        return true;
    }

    /**
     * Determine whether the user can update the kotabaru_link.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KotabaruLink  $kotabaruLink
     * @return mixed
     */
    public function update(User $user, KotabaruLink $kotabaruLink)
    {
        // Update $user authorization to update $kotabaruLink here.
        return true;
    }

    /**
     * Determine whether the user can delete the kotabaru_link.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KotabaruLink  $kotabaruLink
     * @return mixed
     */
    public function delete(User $user, KotabaruLink $kotabaruLink)
    {
        // Update $user authorization to delete $kotabaruLink here.
        return true;
    }
}
