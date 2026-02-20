<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Bill;

use SistemAtc\Asaas\DTO\Request\Bill\ListBillPaymentsFilterRequestDTO;
use SistemAtc\Asaas\Tests\TestCase;

class ListBillPaymentsFilterDTOTest extends TestCase
{
    public function test_create_list_bill_payments_filter_dto_from_array(): void
    {
        $data = [
            'offset' => 0,
            'limit' => 100,
        ];

        $dto = ListBillPaymentsFilterRequestDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(ListBillPaymentsFilterRequestDTO::class);
    }

    public function test_list_bill_payments_filter_dto_to_array(): void
    {
        $data = [
            'offset' => 0,
            'limit' => 100,
        ];

        $dto = ListBillPaymentsFilterRequestDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_list_bill_payments_filter_dto_validation(): void
    {
        $data = [
            'offset' => 0,
            'limit' => 100,
        ];

        $dto = ListBillPaymentsFilterRequestDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(ListBillPaymentsFilterRequestDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}