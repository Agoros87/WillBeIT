<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CommentReaction;
use Illuminate\Http\Request;

class CommentReactionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment_id' => 'required|exists:comments,id',
            'reaction_type' => 'required|in:like,love,angry,sad,laugh'
        ]);

        $reaction = CommentReaction::where('user_id', auth()->id())
            ->where('comment_id', $request->comment_id)
            ->first();

        if ($reaction) {
            if ($reaction->reaction_type === $request->reaction_type) {
                $reaction->delete();
                return back()->with('success', 'Reacción eliminada.');
            }

            $reaction->update(['reaction_type' => $request->reaction_type]);
        } else {
            CommentReaction::create([
                'comment_id' => $request->comment_id,
                'user_id' => auth()->id(),
                'reaction_type' => $request->reaction_type
            ]);
        }

        return back()->with('success', 'Reacción registrada.');
    }
}

