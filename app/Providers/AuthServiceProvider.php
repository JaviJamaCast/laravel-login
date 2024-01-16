<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Articulo;


// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Devuelve TRUE si el usuario tiene el valor 'is_admin' a 1.
        Gate::define('manage_users', function (User $user) {
            return $user->is_admin == 1;
        });

        // Devuelve TRUE si el usuario es el creador del Articulo.
        Gate::define('update-articulo', function (User $user, Articulo $articulo) {
            return $user->id === $articulo->user_id;
        });
    }
}
