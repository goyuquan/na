<?php

namespace App\Providers;

use App\Info;
use App\Policies\InfoPolicy;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        Info::class => InfoPolicy::class,
        'App\Model' => 'App\Policies\ModelPolicy',
    ];


    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        //
    }
}
