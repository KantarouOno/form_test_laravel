<?php
namespace App\Providers;

use App\Service\WritingService;
use Illuminate\Support\ServiceProvider;

class WritingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Post',function($app){
            return new WritingService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}