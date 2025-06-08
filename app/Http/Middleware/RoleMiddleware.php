<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    //creado para que tanto el superadmin como el admin puedan acceder a las rutas especificas de su rol('lo he echo para mostrar centros')
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            abort(403, 'No autenticado');
        }

        $user = Auth::user();

        // Recorre todos los roles permitidos y verifica si el usuario tiene al menos uno
        foreach ($roles as $role) {
            if ($user->hasRole($role)) {
                return $next($request);
            }
        }

        abort(403, 'Acceso denegado');
    }
}
