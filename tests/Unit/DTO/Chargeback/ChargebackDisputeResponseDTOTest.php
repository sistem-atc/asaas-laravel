<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Chargeback;

use SistemAtc\Asaas\DTO\Response\Chargeback\ChargebackDisputeResponseDTO;
use SistemAtc\Asaas\Tests\TestCase;

class ChargebackDisputeResponseDTOTest extends TestCase
{
    public function test_create_chargeback_dispute_response_dto_from_array(): void
    {
        $data = [
            'id' => 'cbd_123456',
            'status' => 'SUBMITTED',
        ];

        $dto = ChargebackDisputeResponseDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(ChargebackDisputeResponseDTO::class);
    }

    public function test_chargeback_dispute_response_dto_to_array(): void
    {
        $data = [
            'id' => 'cbd_123456',
            'status' => 'SUBMITTED',
        ];

        $dto = ChargebackDisputeResponseDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_chargeback_dispute_response_dto_validation(): void
    {
        $data = [
            'id' => 'cbd_123456',
            'status' => 'SUBMITTED',
        ];

        $dto = ChargebackDisputeResponseDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(ChargebackDisputeResponseDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}