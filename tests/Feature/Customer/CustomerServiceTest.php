<?php

use Illuminate\Support\Facades\Http;
use SistemAtc\Asaas\Facades\Asaas;
use SistemAtc\Asaas\DTO\Shared\Request\AsaasCustomer;

test('it returns null or handles error when asaas api fails', function () {
    Http::fake([
        'https://sandbox.asaas.com/api/v3/*' => Http::response([
            'errors' => [
                ['code' => 'invalid_email', 'description' => 'O e-mail informado é inválido.']
            ]
        ], 400)
    ]);

    $customerDTO = AsaasCustomer::fromArray([
        'name' => 'Kleber', 
        'email' => 'email-errado'
    ]);

    expect(fn() => Asaas::customer()->create($customerDTO))
        ->toThrow(\Exception::class, 'O e-mail informado é inválido.');
});