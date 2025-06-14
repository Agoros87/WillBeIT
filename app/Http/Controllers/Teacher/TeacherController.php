<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Podcast;
use App\Models\Post;
use App\Models\User;
use App\Models\Video;

class TeacherController extends Controller
{
    public function index()
    {
        $teacher = auth()->user();

        $studentsApproved = User::whereHas('roles', function($q) {
            $q->where('name', 'student');
        })
            ->where('status', 'approved')
            ->where('center_id', $teacher->center_id)
            ->paginate(5, ['*'], 'approved_page');

        $studentsPending = User::whereHas('roles', function($q) {
            $q->where('name', 'student');
        })
            ->where('status', 'pending')
            ->where('center_id', $teacher->center_id)
            ->where('invited_by', $teacher->id)
            ->paginate(5, ['*'], 'pending_page');

        $studentsApprovedAll = count(User::whereHas('roles', function($q) {
            $q->where('name', 'student');
        })
            ->where('status', 'approved')
            ->where('center_id', $teacher->center_id)
            ->get());
        $studentsPendingAll = count(User::whereHas('roles', function($q) {
            $q->where('name', 'student');
        })
            ->where('status', 'pending')
            ->where('center_id', $teacher->center_id)
            ->where('invited_by', $teacher->id)
            ->get());

        $postPending = Post::whereHas('user', function($q) use($teacher) {
            $q->where('center_id', $teacher->center_id);
        })->where('status', 'pending')
        ->paginate(5, ['*'], 'post_pending_page');

        $podcastPending = Podcast::whereHas('user', function($q) use($teacher) {
            $q->where('center_id', $teacher->center_id);
        })->where('status', 'pending')
            ->paginate(5, ['*'], 'podcast_pending_page');

        $videoPending = Video::whereHas('user', function($q) use($teacher) {
            $q->where('center_id', $teacher->center_id);
        })->where('status', 'pending')
            ->paginate(5, ['*'], 'video_pending_page');

        return view('teacher.dashboard', compact('studentsApproved', 'studentsPending', 'studentsApprovedAll', 'studentsPendingAll', 'postPending', 'podcastPending', 'videoPending'));
    }
    public function acceptStudent(User $student)
    {
        $student->update(['status' => 'approved']);
        return back()->with('success', 'Student accepted.');
    }

    public function rejectStudent(User $student)
    {
        $student->update(['status' => 'rejected']);
        return back()->with('success', 'Student rejected.');
    }

    public function acceptPost(Post $post)
    {
        $post->update(['status' => 'approved',
                        'created_at' => now()]);
        return redirect()->route('teacher.dashboard')->with('success', 'Acción realizada correctamente.');
    }

    public function rejectPost(Post $post)
    {
        $post->update(['status' => 'rejected']);
        return back()->with('success', 'Student rejected.');
    }
    public function acceptPodcast(Podcast $podcast)
    {
        $podcast->update(['status' => 'approved',
            'created_at' => now()]);
        return redirect()->route('teacher.dashboard')->with('success', 'Acción realizada correctamente.');
    }

    public function rejectPodcast(Podcast $podcast)
    {
        $podcast->update(['status' => 'rejected']);
        return back()->with('success', 'Student rejected.');
    }

    public function acceptVideo(Video $video)
    {
        $video->update(['status' => 'approved',
            'created_at' => now()]);
        return redirect()->route('teacher.dashboard')->with('success', 'Acción realizada correctamente.');
    }

    public function rejectVideo(Video $video)
    {
        $video->update(['status' => 'rejected']);
        return back()->with('success', 'Student rejected.');
    }
}
