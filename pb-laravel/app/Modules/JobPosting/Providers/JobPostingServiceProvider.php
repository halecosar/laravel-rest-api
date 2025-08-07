<?php
namespace App\Modules\JobPosting\Providers;
use Illuminate\Support\ServiceProvider;

class JobPostingServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Modules\JobPosting\Repositories\JobPostingRepositoryInterface',
            'App\Modules\JobPosting\Repositories\JobPostingRepository'
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