<?php

namespace App\Providers;

use App\Models\Customer;
use App\Models\User;
use App\Policies\CustomerPolicy;
use App\Policies\UserPolicy;
use App\Models\Company;
use App\Policies\CompanyPolicy;
use App\Policies\ProjectPolicy;
use App\Models\Event;
use App\Policies\EventPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Company::class => CompanyPolicy::class,
        Event::class => EventPolicy::class,
        Project::class => ProjectPolicy::class,
        Customer::class => CustomerPolicy::class
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
