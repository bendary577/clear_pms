<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {
        Schema::defaultstringLength(191);
        $charts->register([
            \App\Charts\SampleChart::class
        ]);
        Paginator::useBootstrap();
    }
}
