<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Bill;

use SistemAtc\Asaas\DTO\Request\Bill\CreateBillRequestDTO;
use SistemAtc\Asaas\Tests\TestCase;

class CreateBillDTOTest extends TestCase
{
    public function test_create_create_bill_dto_from_array(): void
    {
        $data = [
            'identificationField' => 'Id123456',
            'value' => 100,
            'description' => 'Test Bill',
            'dueDate' => '2025-02-20',
        ];

        $dto = CreateBillRequestDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(CreateBillRequestDTO::class);
    }

    public function test_create_bill_dto_to_array(): void
    {
        $data = [
            'identificationField' => 'Id123456',
            'value' => 100,
            'description' => 'Test Bill',
            'dueDate' => '2025-02-20',
        ];

        $dto = CreateBillRequestDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_create_bill_dto_validation(): void
    {
        $data = [
            'identificationField' => 'Id123456',
            'value' => 100,
            'description' => 'Test Bill',
            'dueDate' => '2025-02-20',
        ];

        $dto = CreateBillRequestDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(CreateBillRequestDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}