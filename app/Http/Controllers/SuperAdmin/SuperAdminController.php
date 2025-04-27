<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\User;

class SuperAdminController extends Controller
{
    public function index()
    {
        return view('superadmin.dashboard', [
            'totalUsuarios' => User::count(),
            'centrosActivos' => Center::where('status', 'activo')->count(),
            'centrosInactivos' => Center::where('status', 'inactivo')->count(),
            'usuariosHoy' => User::whereDate('created_at', today())->count(),
        ]);
    }
}
