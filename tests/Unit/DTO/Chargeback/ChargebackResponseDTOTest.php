<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Chargeback;

use SistemAtc\Asaas\DTO\Response\Chargeback\ChargebackResponseDTO;
use SistemAtc\Asaas\Tests\TestCase;

class ChargebackResponseDTOTest extends TestCase
{
    public function test_create_chargeback_response_dto_from_array(): void
    {
        $data = [
            'id' => 'chb_123456',
            'status' => 'REQUESTED',
            'reason' => 'CARD_FRAUD',
        ];

        $dto = ChargebackResponseDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(ChargebackResponseDTO::class);
    }

    public function test_chargeback_response_dto_to_array(): void
    {
        $data = [
            'id' => 'chb_123456',
            'status' => 'REQUESTED',
            'reason' => 'CARD_FRAUD',
        ];

        $dto = ChargebackResponseDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_chargeback_response_dto_validation(): void
    {
        $data = [
            'id' => 'chb_123456',
            'status' => 'REQUESTED',
            'reason' => 'CARD_FRAUD',
        ];

        $dto = ChargebackResponseDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(ChargebackResponseDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}