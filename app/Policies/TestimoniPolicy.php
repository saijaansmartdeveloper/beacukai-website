<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Testimoni;
use Illuminate\Auth\Access\HandlesAuthorization;

class TestimoniPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the testimoni.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Testimoni  $testimoni
     * @return mixed
     */
    public function view(User $user, Testimoni $testimoni)
    {
        // Update $user authorization to view $testimoni here.
        return true;
    }

    /**
     * Determine whether the user can create testimoni.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Testimoni  $testimoni
     * @return mixed
     */
    public function create(User $user, Testimoni $testimoni)
    {
        // Update $user authorization to create $testimoni here.
        return true;
    }

    /**
     * Determine whether the user can update the testimoni.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Testimoni  $testimoni
     * @return mixed
     */
    public function update(User $user, Testimoni $testimoni)
    {
        // Update $user authorization to update $testimoni here.
        return true;
    }

    /**
     * Determine whether the user can delete the testimoni.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Testimoni  $testimoni
     * @return mixed
     */
    public function delete(User $user, Testimoni $testimoni)
    {
        // Update $user authorization to delete $testimoni here.
        return true;
    }
}
