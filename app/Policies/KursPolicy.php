<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Kurs;
use Illuminate\Auth\Access\HandlesAuthorization;

class KursPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the kurs.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Kurs  $kurs
     * @return mixed
     */
    public function view(User $user, Kurs $kurs)
    {
        // Update $user authorization to view $kurs here.
        return true;
    }

    /**
     * Determine whether the user can create kurs.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Kurs  $kurs
     * @return mixed
     */
    public function create(User $user, Kurs $kurs)
    {
        // Update $user authorization to create $kurs here.
        return true;
    }

    /**
     * Determine whether the user can update the kurs.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Kurs  $kurs
     * @return mixed
     */
    public function update(User $user, Kurs $kurs)
    {
        // Update $user authorization to update $kurs here.
        return true;
    }

    /**
     * Determine whether the user can delete the kurs.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Kurs  $kurs
     * @return mixed
     */
    public function delete(User $user, Kurs $kurs)
    {
        // Update $user authorization to delete $kurs here.
        return true;
    }
}
