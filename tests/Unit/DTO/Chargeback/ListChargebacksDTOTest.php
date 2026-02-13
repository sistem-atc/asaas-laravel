<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Chargeback;

use SistemAtc\Asaas\DTO\Request\Chargeback\ListChargebacksDTO;
use SistemAtc\Asaas\Tests\TestCase;

class ListChargebacksDTOTest extends TestCase
{
    public function test_create_list_chargebacks_dto_from_array(): void
    {
        $data = [
            'offset' => 0,
            'limit' => 100,
        ];

        $dto = ListChargebacksDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(ListChargebacksDTO::class);
    }

    public function test_list_chargebacks_dto_to_array(): void
    {
        $data = [
            'offset' => 0,
            'limit' => 100,
        ];

        $dto = ListChargebacksDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_list_chargebacks_dto_validation(): void
    {
        $data = [
            'offset' => 0,
            'limit' => 100,
        ];

        $dto = ListChargebacksDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(ListChargebacksDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}