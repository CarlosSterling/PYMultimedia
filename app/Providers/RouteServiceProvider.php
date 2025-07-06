<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        // Carga rutas generales (web)
        Route::middleware('web')
            ->group(base_path('routes/web.php'));

        // Carga rutas de autenticación (opcional)
        Route::middleware('web')
            ->group(base_path('routes/auth.php'));

        // Carga rutas del panel de administración
        Route::middleware('web')
            ->prefix('admin')         // Acceso vía /admin/...
            ->as('admin.')            // Nombre de rutas como admin.areas.index
            ->group(base_path('routes/admin.php'));
    }
}
