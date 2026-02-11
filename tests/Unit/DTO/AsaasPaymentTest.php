<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO;

use SistemAtc\Asaas\Enum\BillingType;
use SistemAtc\Asaas\DTO\Shared\Request\Fine;
use SistemAtc\Asaas\DTO\Shared\Request\Discount;
use SistemAtc\Asaas\DTO\Shared\Request\Interest;
use SistemAtc\Asaas\DTO\Request\Payment\PaymentDTO;
use SistemAtc\Asaas\DTO\Shared\Request\AsaasCustomer;

test('deve hidratar e converter para array uma DTO de Payment completa', function () {
    $data = $this->getFixture('Customer/create_customer_request');
    $customer = AsaasCustomer::fromArray($data);
        
    $payload = [
        'customer'    => $customer,
        'billingType' => 'BOLETO',
        'value'       => 150.50,
        'dueDate'     => '2026-12-31',
        'discount'    => [
            'value' => 10.0,
            'dueDateLimitDays' => 5,
            'type' => 'FIXED'
        ],
        'fine' => [
            'value' => 2.0,
            'type' => 'PERCENTAGE'
        ],
        'interest' => [
            'value' => 1.0
        ]
    ];

    $dto = PaymentDTO::fromArray($payload);

    expect($dto->customer)
        ->and($dto->billingType)->toBe(BillingType::BOLETO)
        ->and($dto->discount)->toBeInstanceOf(Discount::class)
        ->and($dto->fine)->toBeInstanceOf(Fine::class)
        ->and($dto->interest)->toBeInstanceOf(Interest::class);

    $array = $dto->toArray();

    expect($array['billingType'])->toBe('BOLETO')
        ->and($array['discount']['value'])->toBe(10.0)
        ->and($array['fine']['type'])->toBe('PERCENTAGE')
        ->and($array['dueDate'])->toBe('2026-12-31');
});

test('deve ignorar campos opcionais nulos no toArray de Payment', function () {
    $data = $this->getFixture('Customer/create_customer_request');
    $customer = AsaasCustomer::fromArray($data);
    $dto = new PaymentDTO(
        customer: $customer,
        billingType: BillingType::PIX,
        value: 100.0,
        dueDate: new \DateTime('2026-02-01')
    );

    $array = $dto->toArray();

    expect($array)->toHaveKey('customer')
        ->and($array)->not->toHaveKey('discount')
        ->and($array)->not->toHaveKey('fine')
        ->and($array)->not->toHaveKey('interest');
});