<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
            // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot() {
        $this->registerPolicies();

        Gate::define('isUser2', function ($user) {
            return $user->hasRole('user2');
        });

        Gate::define('isUser3', function ($user) {
            return $user->hasRole('user3');
        });

        Gate::define('isUser4', function ($user) {
            return $user->hasRole('user4');
        });

        Gate::define('show-discount', function ($user) {
            return $user->hasRole(['user2', 'user3','user4']);
        });
    }
}
