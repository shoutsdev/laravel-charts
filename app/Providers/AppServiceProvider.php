<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use ConsoleTVs\Charts\Registrar as Charts;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot(Charts $charts)
    {
        $charts->register([
            \App\Charts\UserLineChart::class
        ]);
    }
}
