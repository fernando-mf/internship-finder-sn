<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        \Blade::if('logged', function () {
            return auth()->guard('admin')->check() or auth()->guard('web')->check();
        });

        \Blade::if('visitor', function () {
            return !(auth()->guard('admin')->check() or auth()->guard('web')->check());
        });

        \Blade::if('master', function () {
            if(auth()->guard('admin')->check()){
                return auth()->guard('admin')->user()->master;
            }
            return false;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
