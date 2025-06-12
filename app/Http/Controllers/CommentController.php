<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $validated = $request->validated();

        Comment::create([
            'commentable_id' => $validated['commentable_id'],
            'commentable_type' => $validated['commentable_type'],
            'user_id' => auth()->id(),
            'parent_id' => $validated['parent_id'] ?? null,
            'content' => $validated['content'],
        ]);

        return back()->with('success', 'Comentario agregado.');
    }

    public function update(CommentRequest $request, Comment $comment)
    {
        $validated = $request->validated();

        $comment->update([
            'content' => $validated['content'],
        ]);

        return redirect()->route('home', $comment->commentable_id)->with('success', 'Comentario actualizado.');

    }

    public function destroy(Comment $comment)
    {

        $comment->delete();
        return back()->with('success', 'Comentario eliminado.');
    }

    public function edit(Comment $comment)
    {

        return view('comments.edit', compact('comment'));
    }

}
