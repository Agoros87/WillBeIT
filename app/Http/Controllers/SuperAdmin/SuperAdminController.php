<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\Post;
use App\Models\User;

class SuperAdminController extends Controller
{
    public function index()
    {
        return view('superadmin.dashboard', [
            'totalUsuarios' => User::count(),
            'Centros' => Center::count(),
            'PostHoy' => Post::whereDate('created_at', today())->count(),
        ]);
    }
}
