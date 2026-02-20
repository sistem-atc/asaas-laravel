<?php

use Illuminate\Support\Facades\Http;
use SistemAtc\Asaas\DTO\Request\Customer\CustomerRequestDTO;
use SistemAtc\Asaas\Facades\Asaas;

test('it returns null or handles error when asaas api fails', function () {
    Http::fake([
        'https://sandbox.asaas.com/api/v3/*' => Http::response([
            'errors' => [
                ['code' => 'invalid_email', 'description' => 'O e-mail informado é inválido.']
            ]
        ], 400)
    ]);

    $customerDTO = CustomerRequestDTO::fromArray([
        'name' => 'Kleber', 
        'email' => 'email-errado'
    ]);

    expect(fn() => Asaas::customer()->createNewCustomer($customerDTO))
        ->toThrow(\Exception::class, 'O e-mail informado é inválido.');
});