<?php
namespace App\Modules\Applications\Providers;
use Illuminate\Support\ServiceProvider;

class ApplicationServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Modules\Applications\Repositories\ApplicationRepositoryInterface',
            'App\Modules\Applications\Repositories\ApplicationRepository'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}