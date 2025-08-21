<?php

use App\Http\Middleware\CheckUserEnabled;
use Illuminate\Foundation\Application;

use App\Http\Middleware\Admin;
use App\Http\Middleware\JWTMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;



return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware(['web', 'auth', 'admin'])
                ->prefix('admin')
                ->group(base_path('routes/backend.php'));

            Route::middleware(['web', 'auth', 'admin'])
                ->prefix('admin')
                ->group(base_path('routes/admin_setting.php'));

            Route::middleware(['web'])
                ->group(base_path('routes/frontend.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'jwt.verify' => JWTMiddleware::class,
            'admin' => Admin::class,
            // 'check.user.enabled' => CheckUserEnabled::class,
        ]);
        // $middleware->validateCsrfTokens( except: ['api*'] );       

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
