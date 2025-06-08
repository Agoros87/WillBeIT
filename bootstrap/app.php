<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CheckApprovedMiddleware;
use App\Http\Middleware\LanguageMiddleware;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\SuperAdminMiddleware;
use App\Http\Middleware\teacherMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'superadmin' => SuperAdminMiddleware::class,
            'approved' => CheckApprovedMiddleware::class,
            'teacher' => teacherMiddleware::class,
            'admin' => AdminMiddleware::class,
            'role' => RoleMiddleware::class,
        ]);

        $middleware->web(LanguageMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
