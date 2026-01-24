<?php

namespace SistemAtc\Asaas;

use Illuminate\Support\ServiceProvider;

class AsaasServiceProvider extends ServiceProvider
{

public function register(): void
    {
        $this->app->singleton('asaas', function ($app) {
            return new \SistemAtc\Asaas\Asaas();
        });
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/asaas.php' => config_path('asaas.php'),
            ], 'asaas-config');
        }
    }
}