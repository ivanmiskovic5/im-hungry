<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

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
    public function boot()
    {   
        \Blade::if("vlasnik", function(){
            return Auth::user()->hasRole("vlasnik");
        });

        \Blade::if("admin", function(){
            return Auth::user()->hasRole("admin");
        });

        \Blade::if("premium", function(){
            return Auth::user()->hasRole("premium");
        });

        \Blade::if("gost", function(){
            return Auth::user()->hasRole("gost");
        });
    }
}
