<?php

use SistemAtc\Asaas\Facades\Asaas;
use Illuminate\Support\Facades\Http;
use SistemAtc\Asaas\DTO\Request\Customer\CustomerRequestDTO;

test('it sends correct headers when creating a customer', function () {
    Http::fake([
        'https://sandbox.asaas.com/api/v3/*' => Http::response(['id' => 'cus_123'], 200)
    ]);

    config(['asaas.api_key' => 'minha-chave-secreta']);

    $data = [
        'name' => 'John Doe',
        'cpfCnpj' => '24971563792',
        'email' => 'john@example.com',
        'phone' => '4738010919',
        'mobilePhone' => '4799376637',
    ];
    
    $customerDTO = CustomerRequestDTO::fromArray($data);
    
    Asaas::customer()->createNewCustomer($customerDTO);

    Http::assertSent(function ($request) {
        return $request->hasHeader('access_token', 'minha-chave-secreta') &&
               str_contains($request->url(), 'sandbox.asaas.com');
    });
});