<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\AutomaticPix;

use SistemAtc\Asaas\Enum\Frequency;
use SistemAtc\Asaas\Enum\OriginType;
use SistemAtc\Asaas\Tests\TestCase;
use SistemAtc\Asaas\Enum\StatusAutomaticPix;
use SistemAtc\Asaas\DTO\Shared\Common\ImmediateQrCode;
use SistemAtc\Asaas\DTO\Response\AutomaticPix\CreateAuthorizationResponseDTO;

class CreateAuthorizationResponseDTOTest extends TestCase
{
    public function test_create_create_authorization_response_dto_from_array(): void
    {
        $data = [
            'id' => 'aut_123',
            'frequency' => 'MONTHLY',
            'status' => 'ACTIVE',
            'originType' => 'IMMEDIATE_PAYMENT_AND_RECURRING_QR_CODE',
            'immediateQrCode' => [
                'conciliationIdentifier' => 'conc_123',
                'expirationDate' => '2026-12-31',
            ],
        ];

        $dto = CreateAuthorizationResponseDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(CreateAuthorizationResponseDTO::class)
            ->and($dto->frequency)->toBe(Frequency::MONTHLY)
            ->and($dto->status)->toBe(StatusAutomaticPix::ACTIVE)
            ->and($dto->originType)->toBe(OriginType::IMMEDIATE_PAYMENT_AND_RECURRING_QR_CODE)
            ->and($dto->immediateQrCode)->toBeInstanceOf(ImmediateQrCode::class);
    }

    public function test_create_authorization_response_dto_to_array(): void
    {
        $data = [
            'id' => 'aut_123',
            'frequency' => 'MONTHLY',
            'status' => 'ACTIVE',
            'originType' => 'IMMEDIATE_PAYMENT_AND_RECURRING_QR_CODE',
        ];

        $dto = CreateAuthorizationResponseDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray()
            ->and($result['frequency'])->toBe('MONTHLY')
            ->and($result['status'])->toBe('ACTIVE');
    }
}
