<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    public function create(User $user): bool
    {
        return $user->hasRole(['superadmin',  'admin', 'teacher', 'student']);
    }

    /**
     * Determine whether the user can update the post.
     */
    public function update(User $user, Post $post): bool
    {
        return ( $user->hasRole('superadmin') ||
            $user->hasRole('admin') ||
            $user->hasRole('teacher') ||
            $user->id === $post->user_id ) && ($user->center_id === $post->user->center_id || $user->hasRole('superadmin'));
    }

    /**
     * Determine whether the user can delete the post.
     */
    public function delete(User $user, Post $post): bool
    {
        return ( $user->hasRole('superadmin') ||
            $user->hasRole('admin') ||
            $user->hasRole('teacher') ||
                $user->id === $post->user_id )
            && ($user->center_id === $post->user->center_id || $user->hasRole('superadmin'));
    }

}
