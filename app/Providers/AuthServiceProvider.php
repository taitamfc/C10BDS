<?php
namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Branch; //1
use App\Models\Customer;//3
use App\Models\Option;//7
use App\Models\Role;//5
use App\Policies\BranchPolicy;//2
use App\Policies\CustomerPolicy;//4
use App\Policies\OptionPolicy;//8
use App\Policies\RolePolicy;//6

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
