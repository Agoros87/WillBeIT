<?php

namespace App\Policies;

use App\Models\Podcast;
use App\Models\User;
use App\Models\Video;
use Illuminate\Auth\Access\Response;

class VideoPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole(['superadmin', 'admin', 'teacher', 'student']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Video $video): bool
    {
        return (
                $user->hasRole('superadmin') ||
                $user->hasRole('admin') ||
                $user->hasRole('teacher') ||
                $user->id === $video->user_id) &&
            ($user->center_id === $video->user->center_id ||$user->hasRole('superadmin'));
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Video $video): bool
    {
        return (
                $user->hasRole('superadmin') ||
                $user->hasRole('admin') ||
                $user->hasRole('teacher') ||
                $user->id === $video->user_id) &&
            ($user->center_id === $video->user->center_id || $user->hasRole('superadmin'));
    }

}
