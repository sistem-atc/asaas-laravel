<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\AutomaticPix;

use SistemAtc\Asaas\Enum\Frequency;
use SistemAtc\Asaas\Tests\TestCase;
use SistemAtc\Asaas\DTO\Shared\Request\ImmediateQrCode;
use SistemAtc\Asaas\DTO\Request\AutomaticPix\CreateAuthorizationRequestDTO;

class CreateAuthorizationRequestDTOTest extends TestCase
{
    public function test_create_create_authorization_request_dto_from_array(): void
    {
        $data = [
            'frequency' => 'MONTHLY',
            'contractId' => 'contract_123',
            'startDate' => '2026-02-01',
            'customerId' => 'cus_123',
            'immediateQrCode' => [
                'expirationSeconds' => 600,
                'originalValue' => 120.50,
            ],
        ];

        $dto = CreateAuthorizationRequestDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(CreateAuthorizationRequestDTO::class)
            ->and($dto->frequency)->toBe(Frequency::MONTHLY)
            ->and($dto->immediateQrCode)->toBeInstanceOf(ImmediateQrCode::class);
    }

    public function test_create_authorization_request_dto_to_array(): void
    {
        $data = [
            'frequency' => 'MONTHLY',
            'contractId' => 'contract_123',
            'startDate' => '2026-02-01',
            'customerId' => 'cus_123',
            'immediateQrCode' => [
                'expirationSeconds' => 600,
                'originalValue' => 120.50,
            ],
        ];

        $dto = CreateAuthorizationRequestDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray()
            ->and($result['frequency'])->toBe('MONTHLY');
    }
}
