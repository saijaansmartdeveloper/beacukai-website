<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Layanan;
use Illuminate\Auth\Access\HandlesAuthorization;

class LayananPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the layanan.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Layanan  $layanan
     * @return mixed
     */
    public function view(User $user, Layanan $layanan)
    {
        // Update $user authorization to view $layanan here.
        return true;
    }

    /**
     * Determine whether the user can create layanan.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Layanan  $layanan
     * @return mixed
     */
    public function create(User $user, Layanan $layanan)
    {
        // Update $user authorization to create $layanan here.
        return true;
    }

    /**
     * Determine whether the user can update the layanan.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Layanan  $layanan
     * @return mixed
     */
    public function update(User $user, Layanan $layanan)
    {
        // Update $user authorization to update $layanan here.
        return true;
    }

    /**
     * Determine whether the user can delete the layanan.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Layanan  $layanan
     * @return mixed
     */
    public function delete(User $user, Layanan $layanan)
    {
        // Update $user authorization to delete $layanan here.
        return true;
    }
}
