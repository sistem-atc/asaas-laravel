<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Production Settings (Defined by env production)
    |--------------------------------------------------------------------------
    */

    'production' => [
        'base_url'     => env('ASAAS_BASE_URL', 'https://api.assas.com'),
        'version'      => env('ASAAS_API_VERSION', 'v3'),
        'access_token' => env('ASAAS_ACCESS_TOKEN'),
        'pix_key'      => env('ASAAS_PIX_KEY'),
        'group_name'   => env('GROUP_NAME_ASAAS', 'Grupo nao Cadastrado')
    ],

    /*
    |--------------------------------------------------------------------------
    | Sandbox Settings (define env local)
    |--------------------------------------------------------------------------
    */

    'sandbox' => [
        'base_url'     => env('ASAAS_SANDBOX_BASE_URL', 'https://sandbox.assas.com'),
        'version'      => env('ASAAS_SANDBOX_API_VERSION', 'v3'),
        'access_token' => env('ASAAS_SANDBOX_ACCESS_TOKEN'),
        'pix_key'      => env('ASAAS_SANDBOX_PIX_KEY'),
        'group_name'   => env('GROUP_NAME_SANDBOX_ASAAS', 'Grupo nao Cadastrado')
    ],

    /*
    |--------------------------------------------------------------------------
    | Webhook Security
    |--------------------------------------------------------------------------
    |
    | The access token configured in your Asaas panel to ensure that incoming
    | webhook requests are legitimate and authorized.
    |
    */

    'webhook_token' => env('ASAAS_WEBHOOK_TOKEN'),

    /*
    |--------------------------------------------------------------------------
    | TTL for Idempotency Handling
    |--------------------------------------------------------------------------
    |
    | Time in seconds to keep records of processed webhook events
    |
    */

    'idempotency_ttl' => env('ASAAS_IDEMPOTENCY_TTL', 86400),

    /*
    |--------------------------------------------------------------------------
    | Route events
    |--------------------------------------------------------------------------
    |
    | Register the route that receive events.
    |
    */

    'route_events' => [
        'path' => env('ASAAS_ROUTE_EVENTS', '/asaas-events'),
        'route_name' => env('ASAAS_ROUTE_EVENTS_NAME', 'asaas.webhook'),
    ], 
        

];
