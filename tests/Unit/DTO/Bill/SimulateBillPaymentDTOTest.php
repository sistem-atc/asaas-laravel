<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Bill;

use SistemAtc\Asaas\DTO\Request\Bill\SimulateBillPaymentRequestDTO;
use SistemAtc\Asaas\Tests\TestCase;

class SimulateBillPaymentDTOTest extends TestCase
{
    public function test_create_simulate_bill_payment_dto_from_array(): void
    {
        $data = [
            'barCode' => '12345.67890 12345.678901 12345.678901 1 12345678901234',
        ];

        $dto = SimulateBillPaymentRequestDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(SimulateBillPaymentRequestDTO::class);
    }

    public function test_simulate_bill_payment_dto_to_array(): void
    {
        $data = [
            'barCode' => '12345.67890 12345.678901 12345.678901 1 12345678901234',
        ];

        $dto = SimulateBillPaymentRequestDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_simulate_bill_payment_dto_validation(): void
    {
        $data = [
            'barCode' => '12345.67890 12345.678901 12345.678901 1 12345678901234',
        ];

        $dto = SimulateBillPaymentRequestDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(SimulateBillPaymentRequestDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}