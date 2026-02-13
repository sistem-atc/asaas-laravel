<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Bill;

use SistemAtc\Asaas\DTO\Response\Bill\SimulateBillPaymentResponseDTO;
use SistemAtc\Asaas\Tests\TestCase;

class SimulateBillPaymentResponseDTOTest extends TestCase
{
    public function test_create_simulate_bill_payment_response_dto_from_array(): void
    {
        $data = [
            'details' => [],
        ];

        $dto = SimulateBillPaymentResponseDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(SimulateBillPaymentResponseDTO::class);
    }

    public function test_simulate_bill_payment_response_dto_to_array(): void
    {
        $data = [
            'details' => [],
        ];

        $dto = SimulateBillPaymentResponseDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_simulate_bill_payment_response_dto_validation(): void
    {
        $data = [
            'details' => [],
        ];

        $dto = SimulateBillPaymentResponseDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(SimulateBillPaymentResponseDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}