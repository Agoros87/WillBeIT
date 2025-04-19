<?php

namespace App\Policies;

use App\Models\Podcast;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PodcastPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('super-admin') || $user->hasRole('admin') || $user->hasRole('teacher') || $user->hasRole('student');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Podcast $podcast): bool
    {
        return $user->hasRole('super-admin') || $user->hasRole('admin') || $user->hasRole('teacher') || $user->id === $podcast->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Podcast $podcast): bool
    {
        return $user->hasRole('super-admin') || $user->hasRole('admin') || $user->hasRole('teacher') || $user->id === $podcast->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Podcast $podcast): bool
    {
        return $user->hasRole('super-admin') || $user->hasRole('admin') || $user->hasRole('teacher');
    }
}
