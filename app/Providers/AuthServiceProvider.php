<?php

namespace App\Providers;

use App\Policies\RolePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Spatie\Permission\Models\Role;
use App\Commodity;
use App\CommodityIn;
use App\CommodityOut;
use App\CommodityLoan;
use App\User;
use App\Sanction;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Role::class => RolePolicy::class,
        Commodity::class => \App\Policies\CommodityPolicy::class,
        CommodityIn::class => \App\Policies\CommodityInPolicy::class,
        CommodityOut::class => \App\Policies\CommodityOutPolicy::class,
        CommodityLoan::class => \App\Policies\CommodityLoanPolicy::class,
        User::class => \App\Policies\UserPolicy::class,
        Sanction::class => \App\Policies\SanctionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
