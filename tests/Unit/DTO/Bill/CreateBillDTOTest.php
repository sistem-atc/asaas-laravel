<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Bill;

use SistemAtc\Asaas\DTO\Request\Bill\CreateBillDTO;
use SistemAtc\Asaas\Tests\TestCase;

class CreateBillDTOTest extends TestCase
{
    public function test_create_create_bill_dto_from_array(): void
    {
        $data = [
            'value' => 100,
            'description' => 'Test Bill',
            'dueDate' => '2025-02-20',
        ];

        $dto = CreateBillDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(CreateBillDTO::class);
    }

    public function test_create_bill_dto_to_array(): void
    {
        $data = [
            'value' => 100,
            'description' => 'Test Bill',
            'dueDate' => '2025-02-20',
        ];

        $dto = CreateBillDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_create_bill_dto_validation(): void
    {
        $data = [
            'value' => 100,
            'description' => 'Test Bill',
            'dueDate' => '2025-02-20',
        ];

        $dto = CreateBillDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(CreateBillDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}