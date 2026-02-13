<?php

use SistemAtc\Asaas\Facades\Asaas;
use Illuminate\Support\Facades\Http;
use SistemAtc\Asaas\DTO\Request\Customer\AsaasCustomer;

test('it sends correct headers when creating a customer', function () {
    Http::fake([
        'https://sandbox.asaas.com/api/v3/*' => Http::response(['id' => 'cus_123'], 200)
    ]);

    config(['asaas.api_key' => 'minha-chave-secreta']);

    $customerDTO = AsaasCustomer::fromArray(['name' => 'Kleber']);
    
    Asaas::customer()->createNewCustomer($customerDTO);

    Http::assertSent(function ($request) {
        return $request->hasHeader('access_token', 'minha-chave-secreta') &&
               str_contains($request->url(), 'sandbox.asaas.com');
    });
});