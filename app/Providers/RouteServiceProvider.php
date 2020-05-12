<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function map()
    {
        Route::mailcoach('mailcoach');
        Route::sesFeedback('ses-feedback');

        $this
            ->mapWebRoutes()
            ->mapAppRoutes()
            ->mapAuthRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')->group(base_path('routes/web.php'));

        return $this;
    }

    protected function mapAppRoutes()
    {
        Route::middleware(['web', 'auth'])->group(base_path('routes/app.php'));

        return $this;
    }

    protected function mapAuthRoutes()
    {
        Route::middleware('web')
            ->group(base_path('routes/auth.php'));

        return $this;
    }
}
