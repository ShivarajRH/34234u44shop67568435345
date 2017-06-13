<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Carbon\Carbon;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
        
        Passport::enableImplicitGrant();
        
        Passport::tokensExpireIn(Carbon::now()->addHours(1)); //addDays(15)
        
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));
        
        Passport::tokensCan([
            'place-orders' => 'Place orders permission',
            'check-status' => 'Check order status'
        ]);
        
    }
}
