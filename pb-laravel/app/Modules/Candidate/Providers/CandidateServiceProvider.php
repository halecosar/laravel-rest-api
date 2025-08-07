<?php
namespace App\Modules\Candidate\Providers;
use Illuminate\Support\ServiceProvider;

class CandidateServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Modules\Candidate\Repositories\CandidateRepositoryInterface',
            'App\Modules\Candidate\Repositories\CandidateRepository'
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