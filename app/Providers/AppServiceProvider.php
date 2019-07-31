<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Lapang;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer(['booking.partials.form','bookingm.partials.form'], function ($view){
            $view->with('lapangs',Lapang::where('status_lapang','1')->get());
        });
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
