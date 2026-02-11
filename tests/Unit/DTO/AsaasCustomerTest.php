<?php

use SistemAtc\Asaas\DTO\Shared\Request\AsaasCustomer;

test('deve hidratar corretamente a DTO de Customer a partir de um array', function () {
    $data = $this->getFixture('Customer/create_customer_request');
    $dto = AsaasCustomer::fromArray($data);

    expect($dto)->toBeInstanceOf(AsaasCustomer::class)
        ->and($dto->name)->toBe('John Doe')
        ->and($dto->notificationDisabled)->toBeTrue()
        ->and($dto->email)->toBe('john.doe@asaas.com.br');
});

test('deve converter a DTO de Customer para array removendo nulos', function () {
    $dto = new AsaasCustomer(
        name: 'Jane Doe',
        cpfCnpj: '98765432100',
        notificationDisabled: false
    );

    $array = $dto->toArray();
    
    expect($array)->toHaveKey('name', 'Jane Doe')
        ->and($array)->toHaveKey('cpfCnpj', '98765432100')
        ->and($array)->toHaveKey('notificationDisabled', false);

    expect($array)->not->toHaveKey('email')
        ->and($array)->not->toHaveKey('phone');
});

test('deve garantir que tipos boleanos e numericos sejam preservados ou convertidos', function () {
    $data = [
        'name' => 'Test Type',
        'foreignCustomer' => "1",
    ];

    $dto = AsaasCustomer::fromArray($data);

    expect($dto->foreignCustomer)->toBeBool()
        ->toBeTrue();
});