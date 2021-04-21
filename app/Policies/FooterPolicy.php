<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Footer;
use Illuminate\Auth\Access\HandlesAuthorization;

class FooterPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the footer.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Footer  $footer
     * @return mixed
     */
    public function view(User $user, Footer $footer)
    {
        // Update $user authorization to view $footer here.
        return true;
    }

    /**
     * Determine whether the user can create footer.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Footer  $footer
     * @return mixed
     */
    public function create(User $user, Footer $footer)
    {
        // Update $user authorization to create $footer here.
        return true;
    }

    /**
     * Determine whether the user can update the footer.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Footer  $footer
     * @return mixed
     */
    public function update(User $user, Footer $footer)
    {
        // Update $user authorization to update $footer here.
        return true;
    }

    /**
     * Determine whether the user can delete the footer.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Footer  $footer
     * @return mixed
     */
    public function delete(User $user, Footer $footer)
    {
        // Update $user authorization to delete $footer here.
        return true;
    }
}
