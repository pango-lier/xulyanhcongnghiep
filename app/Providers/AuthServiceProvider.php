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
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('is-admin',function(){
            return auth()->guard('admin_users')->user()->isAdmin();
        });
        Gate::define('is-supper-admin',function(){
            return auth()->guard('admin_users')->user()->isSupperAdmin();
        });
        //Gate::define('is-admin','App\Policies\isAdminPolicy@viewAny');
        //
    }
}
