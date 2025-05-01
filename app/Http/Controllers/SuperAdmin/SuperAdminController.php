<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\Podcast;
use App\Models\Post;
use App\Models\User;
use App\Models\Video;

class SuperAdminController extends Controller
{
    public function index()
    {
            $totalUsuarios = User::count();
            $centrosActivos = Center::where('status', 'active')->count();
            $centrosInactivos = Center::where('status', 'inactive')->count();
            $usuariosHoy = User::whereDate('created_at', today())->count();
            $totalVideos = Video::all()->count();
            $totalPodcast =Podcast::all()->count();
            $totalPost = Post::all()->count();

        return view('superadmin.dashboard', compact('totalUsuarios',
            'centrosActivos',
            'centrosInactivos',
            'usuariosHoy',
            'totalVideos',
            'totalPodcast',
            'totalPost',
        ));
    }
}
