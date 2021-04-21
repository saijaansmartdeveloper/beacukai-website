<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Directory;
use Illuminate\Auth\Access\HandlesAuthorization;

class DirectoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the directory.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Directory  $directory
     * @return mixed
     */
    public function view(User $user, Directory $directory)
    {
        // Update $user authorization to view $directory here.
        return true;
    }

    /**
     * Determine whether the user can create directory.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Directory  $directory
     * @return mixed
     */
    public function create(User $user, Directory $directory)
    {
        // Update $user authorization to create $directory here.
        return true;
    }

    /**
     * Determine whether the user can update the directory.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Directory  $directory
     * @return mixed
     */
    public function update(User $user, Directory $directory)
    {
        // Update $user authorization to update $directory here.
        return true;
    }

    /**
     * Determine whether the user can delete the directory.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Directory  $directory
     * @return mixed
     */
    public function delete(User $user, Directory $directory)
    {
        // Update $user authorization to delete $directory here.
        return true;
    }
}
