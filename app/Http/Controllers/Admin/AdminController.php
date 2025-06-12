<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Podcast;
use App\Models\Post;
use App\Models\User;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Obtener el usuario autenticado (admin)
        $admin = Auth::user();

        // Obtener el centro asociado al admin
        $center = $admin->center;

        if (!$center) {
            abort(403, 'No tienes un centro asignado');
        }

        // Obtener IDs de usuarios del centro
        $userIds = User::where('center_id', $center->id)->pluck('id');

        // Obtener solo los datos del centro específico
        $totalUsuarios = $userIds->count();
        $usuariosHoy = User::where('center_id', $center->id)
            ->whereDate('created_at', today())
            ->count();

        // Contar contenido multimedia de los usuarios del centro
        $totalVideos = Video::whereIn('user_id', $userIds)->count();
        $totalPodcast = Podcast::whereIn('user_id', $userIds)->count();
        $totalPost = Post::whereIn('user_id', $userIds)->count();

        // Obtener usuarios del centro por mes
        $usuariosPorMes = User::where('center_id', $center->id)
            ->selectRaw('count(*) as count, MONTH(created_at) as month, YEAR(created_at) as year')
            ->groupBy('year', 'month')
            ->whereYear('created_at', Carbon::now()->year)
            ->orderBy('month')
            ->get();

        $usuariosPorMeses = array_fill(0, 12, 0);

        foreach ($usuariosPorMes as $usuario) {
            $usuariosPorMeses[$usuario->month - 1] = $usuario->count;
        }

        $meses = [];
        $cantidadUsuarios = [];

        for ($i = 0; $i < 12; $i++) {
            $meses[] = Carbon::createFromFormat('m', $i + 1)->format('F');
            $cantidadUsuarios[] = $usuariosPorMeses[$i];
        }

        $totales = [
            'videos' => $totalVideos,
            'podcasts' => $totalPodcast,
            'posts' => $totalPost,
        ];

        return view('admin.dashboard', compact(
            'totalUsuarios',
            'usuariosHoy',
            'totalVideos',
            'totalPodcast',
            'totalPost',
            'meses',
            'cantidadUsuarios',
            'totales',
            'center'
        ));
    }

    public function myCenter()
    {
        $centro = Auth::user()->center;
        return view('admin.my-center', compact('centro'));
    }

    public function postsUsersCenters()
    {
        $posts = Post::with('user.center')
            ->whereHas('user', function ($query) {
                $query->where('center_id', Auth::user()->center_id);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('admin.posts-users-centers', compact('posts'));
    }

    public function podcastsUsersCenters()
    {
        $podcasts = Podcast::with('user.center')
            ->whereHas('user', function ($query) {
                $query->where('center_id', Auth::user()->center_id);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('admin.podcasts-users-centers', compact('podcasts'));
    }

    public function videosUsersCenters()
    {
        $videos = Video::with('user.center')
            ->whereHas('user', function ($query) {
                $query->where('center_id', Auth::user()->center_id)
                    ->whereDoesntHave('roles', function ($q) {
                        $q->where('name', 'superadmin');
                    });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('admin.videos-users-centers', compact('videos'));
    }


    public function usersCenters()
    {
        $users = User::where('center_id', auth()->user()->center_id)
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', 'superadmin');
            })
            ->paginate(9);

        return view('admin.users-centers', compact('users'));
    }
}
