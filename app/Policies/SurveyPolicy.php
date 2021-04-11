<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Survey;
use Illuminate\Auth\Access\HandlesAuthorization;

class SurveyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the survey.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Survey  $survey
     * @return mixed
     */
    public function view(User $user, Survey $survey)
    {
        // Update $user authorization to view $survey here.
        return true;
    }

    /**
     * Determine whether the user can create survey.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Survey  $survey
     * @return mixed
     */
    public function create(User $user, Survey $survey)
    {
        // Update $user authorization to create $survey here.
        return true;
    }

    /**
     * Determine whether the user can update the survey.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Survey  $survey
     * @return mixed
     */
    public function update(User $user, Survey $survey)
    {
        // Update $user authorization to update $survey here.
        return true;
    }

    /**
     * Determine whether the user can delete the survey.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Survey  $survey
     * @return mixed
     */
    public function delete(User $user, Survey $survey)
    {
        // Update $user authorization to delete $survey here.
        return true;
    }
}
