<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Payment;

use SistemAtc\Asaas\DTO\Request\Payment\ListPaymentRequestDTO;
use SistemAtc\Asaas\Tests\TestCase;

class ListPaymentTest extends TestCase
{
    public function test_create_list_payment_from_array(): void
    {
        $data = [
            'offset' => 0,
            'limit' => 50,
        ];

        $dto = ListPaymentRequestDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(ListPaymentRequestDTO::class);
    }

    public function test_list_payment_to_array(): void
    {
        $data = [
            'offset' => 0,
            'limit' => 50,
        ];

        $dto = ListPaymentRequestDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_list_payment_validation(): void
    {
        $data = [
            'offset' => 0,
            'limit' => 50,
        ];

        $dto = ListPaymentRequestDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(ListPaymentRequestDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}