<?php

namespace SistemAtc\Asaas\Tests;

use SistemAtc\Asaas\AsaasServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use SistemAtc\Asaas\Tests\Traits\InteractsWithFixtures;

class TestCase extends Orchestra
{

    use InteractsWithFixtures;

    protected function getPackageProviders($app)
    {
        return [
            AsaasServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        
        $app['config']->set('asaas.sandbox', [
            'base_url'     => 'https://sandbox.asaas.com',
            'version'      => 'api/v3',
            'access_token' => 'minha-chave-secreta',
            'pix_key'      => 'minha-chave-pix',
        ]);
        
        $app['config']->set('asaas.webhook_token', 'token-de-teste');
    }
}