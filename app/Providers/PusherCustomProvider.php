<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PusherCustomProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {


      \App::singleton('App\PusherReference\PusherRef',function(){
      return new \App\PusherReference\PusherRef(config('services.pusher.APP_KEY'),config('services.pusher.APP_ID'),config('services.pusher.APP_SECRET'),config('services.pusher.APP_CLUSTER'));

    });

}



    }
