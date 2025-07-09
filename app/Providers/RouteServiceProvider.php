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
    // Rutas generales
    Route::middleware('web')
        ->group(base_path('routes/web.php'));

    // Rutas de autenticación
    Route::middleware('web')
        ->group(base_path('routes/auth.php'));

    // Rutas del panel de administración
    Route::middleware(['web', 'auth', 'verified', 'isAdmin'])
        ->prefix('admin')         // URL: /admin/...
        ->group(base_path('routes/admin.php'));
}

}
