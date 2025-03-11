<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\EloquentUserProvider;
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

        // Personalizar el proveedor de autenticación
        Auth::provider('eloquent', function ($app, array $config) {
            return new class($app['hash'], $config['model']) extends EloquentUserProvider {
                // Sobrescribir el método para validar el correo con el dominio @upfim.edu.mx
                public function validateCredentials(\Illuminate\Contracts\Auth\Authenticatable $user, array $credentials)
                {
                    // Verifica que el correo sea de la universidad
                    if (!str_ends_with($credentials['email'], '@upfim.edu.mx')) {
                        return false; // Solo permite los correos con este dominio
                    }
                    return parent::validateCredentials($user, $credentials);
                }
            };
        });
    }
}
