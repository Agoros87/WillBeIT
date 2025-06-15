<?php
namespace App\Policies;

use App\Models\Comment;
use App\Models\User;

class CommentPolicy
{
    /**
     * Determine whether the user can update the comment.
     */
    public function update(User $user, Comment $comment): bool
    {
        return ( $user->hasRole('superadmin') ||
                $user->hasRole('admin') ||
                $user->hasRole('teacher') ||
                $user->id === $comment->user_id ) &&
            ($user->center_id === $comment->user->center_id || $user->hasRole('superadmin'));
    }


    /**
     * Determine whether the user can delete the comment.
     */
    public function delete(User $user, Comment $comment): bool
    {
        return ( $user->hasRole('superadmin') ||
                $user->hasRole('admin') ||
                $user->hasRole('teacher') ||
                $user->id === $comment->user_id ) &&
            ($user->center_id === $comment->user->center_id || $user->hasRole('superadmin'));
    }
}
