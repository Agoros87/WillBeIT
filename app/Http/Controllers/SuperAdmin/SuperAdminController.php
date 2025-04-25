<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\User;

class SuperAdminController extends Controller
{
    public function index()
    {
        // Obtener datos para el dashboard
        $totalUsuarios = User::count();
        $centrosActivos = Center::where('status', 'active')->count();
        $centrosInactivos = Center::where('status', 'inactive')->count();
        $usuariosHoy = User::whereDate('created_at', now()->toDateString())->count();


        // Datos para la vista
        return view('admin.adminDashboard', [
            'totalUsuarios' => $totalUsuarios,
            'centrosActivos' => $centrosActivos,
            'centrosInactivos' => $centrosInactivos,
            'usuariosHoy' => $usuariosHoy,
        ]);
    }
}
