<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Bill;

use SistemAtc\Asaas\DTO\Response\Bill\BillResponseDTO;
use SistemAtc\Asaas\Tests\TestCase;

class BillResponseDTOTest extends TestCase
{
    public function test_create_bill_response_dto_from_array(): void
    {
        $data = [
            'id' => 'bill_123456',
            'value' => 100,
            'status' => 'OPEN',
        ];

        $dto = BillResponseDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(BillResponseDTO::class);
    }

    public function test_bill_response_dto_to_array(): void
    {
        $data = [
            'id' => 'bill_123456',
            'value' => 100,
            'status' => 'OPEN',
        ];

        $dto = BillResponseDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_bill_response_dto_validation(): void
    {
        $data = [
            'id' => 'bill_123456',
            'value' => 100,
            'status' => 'OPEN',
        ];

        $dto = BillResponseDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(BillResponseDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}