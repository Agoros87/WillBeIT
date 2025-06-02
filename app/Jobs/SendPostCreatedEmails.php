<?php

namespace App\Jobs;

use App\Mail\PostCreatedNotification;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendPostCreatedEmails implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function handle()
    {
        $centerId = $this->post->user->center_id;

        // Obtener todos los profesores del centro
        $teachers = User::role('teacher')->where('center_id', $centerId)->get();

        foreach ($teachers as $teacher) {
            Mail::to($teacher->email)->queue(new PostCreatedNotification($this->post));
        }
    }
}
