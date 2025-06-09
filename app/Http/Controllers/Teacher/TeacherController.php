<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\User;

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
            ->get();

        $studentsPending = User::whereHas('roles', function($q) {
            $q->where('name', 'student');
        })
            ->where('status', 'pending')
            ->where('center_id', $teacher->center_id)
            ->where('invited_by', $teacher->id)
            ->get();

        return view('teacher.dashboard', compact('studentsApproved', 'studentsPending'));
    }
    public function accept(User $student)
    {
        $student->update(['status' => 'approved']);
        return back()->with('success', 'Student accepted.');
    }

    public function reject(User $student)
    {
        $student->update(['status' => 'rejected']);
        return back()->with('success', 'Student rejected.');
    }
}
