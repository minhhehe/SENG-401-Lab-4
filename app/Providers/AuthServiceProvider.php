<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as Gate2;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\Book' => 'App\Policies\BookPolicy',
        'App\Subscription' => 'App\Policies\SubscriptionPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(Gate2 $gate)
    {
        $this->registerPolicies();
        $gate->before(function($user)
        {
          if($user->role == 'admin')return true;
        });
        //
    }
}
