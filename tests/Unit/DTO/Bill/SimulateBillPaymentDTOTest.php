<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Bill;

use SistemAtc\Asaas\DTO\Request\Bill\SimulateBillPaymentDTO;
use SistemAtc\Asaas\Tests\TestCase;

class SimulateBillPaymentDTOTest extends TestCase
{
    public function test_create_simulate_bill_payment_dto_from_array(): void
    {
        $data = [
            'barCode' => '12345.67890 12345.678901 12345.678901 1 12345678901234',
        ];

        $dto = SimulateBillPaymentDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(SimulateBillPaymentDTO::class);
    }

    public function test_simulate_bill_payment_dto_to_array(): void
    {
        $data = [
            'barCode' => '12345.67890 12345.678901 12345.678901 1 12345678901234',
        ];

        $dto = SimulateBillPaymentDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_simulate_bill_payment_dto_validation(): void
    {
        $data = [
            'barCode' => '12345.67890 12345.678901 12345.678901 1 12345678901234',
        ];

        $dto = SimulateBillPaymentDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(SimulateBillPaymentDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}