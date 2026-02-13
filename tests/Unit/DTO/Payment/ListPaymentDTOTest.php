<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Payment;

use SistemAtc\Asaas\DTO\Response\Payment\ListPaymentDTO;
use SistemAtc\Asaas\Tests\TestCase;

class ListPaymentDTOTest extends TestCase
{
    public function test_create_list_payment_dto_from_array(): void
    {
        $data = [
            'offset' => 0,
            'limit' => 50,
        ];

        $dto = ListPaymentDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(ListPaymentDTO::class);
    }

    public function test_list_payment_dto_to_array(): void
    {
        $data = [
            'offset' => 0,
            'limit' => 50,
        ];

        $dto = ListPaymentDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_list_payment_dto_validation(): void
    {
        $data = [
            'offset' => 0,
            'limit' => 50,
        ];

        $dto = ListPaymentDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(ListPaymentDTO::class);

        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}