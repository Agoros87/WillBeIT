<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\Podcast;
use App\Models\Post;
use App\Models\User;
use App\Models\Video;
use Carbon\Carbon;

class SuperAdminController extends Controller
{
    public function index()
    {
        // Datos generales
        $totalUsuarios = User::count();
        $centrosActivos = Center::where('status', 'active')->count();
        $centrosInactivos = Center::where('status', 'inactive')->count();
        $usuariosHoy = User::whereDate('created_at', today())->count();
        $totalVideos = Video::all()->count();
        $totalPodcast = Podcast::all()->count();
        $totalPost = Post::all()->count();

        // Obtener la cantidad de usuarios registrados por mes
        $usuariosPorMes = User::selectRaw('count(*) as count, MONTH(created_at) as month, YEAR(created_at) as year')
            ->groupBy('year', 'month')
            ->whereYear('created_at', Carbon::now()->year)
            ->orderBy('month')
            ->get();
        //creamos un array de 12 elementos inicializados en 0, que son los meses del año
        $usuariosPorMeses = array_fill(0, 12, 0);

        //llenamos el array con la cantidad de usuarios por mes
        foreach ($usuariosPorMes as $usuario) {
            $usuariosPorMeses[$usuario->month - 1] = $usuario->count;
        }

        // Preparamos los datos para el gráfico
        $meses = [];
        $cantidadUsuarios = [];

        // Generamos los nombres de los meses y las cantidades
        for ($i = 0; $i < 12; $i++) {
            $meses[] = Carbon::createFromFormat('m', $i + 1)->format('F'); // Nombre del mes
            $cantidadUsuarios[] = $usuariosPorMeses[$i];
        }
        $totales = [
            'videos' => $totalVideos,
            'podcasts' => $totalPodcast,
            'posts' => $totalPost,
        ];

        return view('superadmin.dashboard', compact(
            'totalUsuarios',
            'centrosActivos',
            'centrosInactivos',
            'usuariosHoy',
            'totalVideos',
            'totalPodcast',
            'totalPost',
            'meses',
            'cantidadUsuarios',
            'totales'
        ));
    }
}
