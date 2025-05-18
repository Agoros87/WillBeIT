<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggle(Post $post)
    {
        $user = auth()->user();

        if ($post->isLikedBy($user)) {
            $post->likedByUsers()->detach($user->id);
        } else {
            $post->likedByUsers()->attach($user->id);
        }

        return back();
    }
}
