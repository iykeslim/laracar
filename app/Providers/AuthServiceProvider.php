<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\Marca;
use App\Models\ModelType;
use App\Models\SystemUsers;
use App\Models\Turno;
use App\Models\VehicleType;
use App\Models\WashType;
use App\Policies\ClientPolicy;
use App\Policies\MarcaPolicy;
use App\Policies\ModelPolicy;
use App\Policies\SystemUserPolicy;
use App\Policies\TurnoPolicy;
use App\Policies\VehicleTypePolicy;
use App\Policies\WashTypePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Client::class => ClientPolicy::class,
        Marca::class => MarcaPolicy::class,
        Turno::class => TurnoPolicy::class,
        ModelType::class => ModelPolicy::class,
        SystemUsers::class => SystemUserPolicy::class,
        WashType::class => WashTypePolicy::class,
        VehicleType::class => VehicleTypePolicy::class,
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
