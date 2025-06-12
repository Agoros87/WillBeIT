<?php

namespace App\Policies;

use App\Models\Podcast;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class PodcastPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole(['superadmin',  'admin', 'teacher', 'student']);

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Podcast $podcast): bool
    {
        return (
                $user->hasRole('superadmin') ||
                $user->hasRole('admin') ||
                $user->hasRole('teacher') ||
                $user->id === $podcast->user_id)
            && ($user->center_id === $podcast->user->center_id || $user->hasRole('superadmin'));
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Podcast $podcast): bool
    {
        return (
            $user->hasRole('superadmin') ||
            $user->hasRole('admin') ||
            $user->hasRole('teacher') ||
            $user->id === $podcast->user_id)
            && ($user->center_id === $podcast->user->center_id || $user->hasRole('superadmin')) ;
    }

}
