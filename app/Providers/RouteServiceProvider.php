<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
     public function boot(): void
    {
        Route::middleware('web')->group(base_path('routes/web.php'));

        $this->loadAdminRoutes();
    }

    protected function loadAdminRoutes(): void
    {
        foreach (glob(base_path('routes/admin/*.php')) as $file) {
            Route::prefix('conexion')
                ->middleware(['web', 'auth'])
                ->group($file);
        }
    }
}
