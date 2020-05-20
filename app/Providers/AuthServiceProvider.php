<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\Marca;
use App\Models\ModelType;
use App\Models\Turno;
use App\Policies\ClientPolicy;
use App\Policies\MarcaPolicy;
use App\Policies\TurnoPolicy;
use Illuminate\Database\Eloquent\Model;
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
        Client::class => ClientPolicy::class,
        Marca::class => MarcaPolicy::class,
        Turno::class => TurnoPolicy::class,
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
