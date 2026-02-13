<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Chargeback;

use SistemAtc\Asaas\DTO\Response\Chargeback\ListChargebackResponseDTO;
use SistemAtc\Asaas\Tests\TestCase;

class ListChargebackResponseDTOTest extends TestCase
{
    public function test_create_list_chargeback_response_dto_from_array(): void
    {
        $data = [
            'data' => [],
        ];

        $dto = ListChargebackResponseDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(ListChargebackResponseDTO::class);
    }

    public function test_list_chargeback_response_dto_to_array(): void
    {
        $data = [
            'data' => [],
        ];

        $dto = ListChargebackResponseDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_list_chargeback_response_dto_validation(): void
    {
        $data = [
            'data' => [],
        ];

        $dto = ListChargebackResponseDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(ListChargebackResponseDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}