<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            'App\Repositories\Interfaces\BaseInterface',
            'App\Repositories\Eloquents\BaseRepository'
        );

        $this->app->bind(
            'App\Repositories\Interfaces\BHYTInterface',
            'App\Repositories\Eloquents\BHYTRepository'
        );

        $this->app->bind(
            'App\Repositories\Interfaces\HoSoNhanVienInterface',
            'App\Repositories\Eloquents\HoSoNhanVienRepository'
        );

        $this->app->bind(
            'App\Repositories\Interfaces\ChamCongInterface',
            'App\Repositories\Eloquents\ChamCongRepository'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
