<?php

App::singleton('App\Billing\Stripe',function(){
$a= new \App\Billing\Stripe(config('services.pusher.APP_KEY'),config('services.pusher.APP_ID'),config('services.pusher.APP_SECRET'),config('services.pusher.APP_CLUSTER'));
return $a;
});
$stripe=App::make('App\Billing\Stripe');

dd($stripe);
