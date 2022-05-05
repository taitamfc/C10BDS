<?php
namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Models\Branch;
use App\Models\Customer;
use App\Models\Option;
use App\Models\Role;
use App\Models\UserGroup;

use App\Policies\BranchPolicy;
use App\Policies\CustomerPolicy;
use App\Policies\OptionPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserGroupPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Branch::class => BranchPolicy::class,
        Customer::class => CustomerPolicy::class,
        Role::class => RolePolicy::class,
        Option::class => OptionPolicy::class,
        UserGroup::class => UserGroupPolicy::class,
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
