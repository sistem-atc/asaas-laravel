<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Payment;

use SistemAtc\Asaas\DTO\Response\Payment\QrCodeResponseDTO;
use SistemAtc\Asaas\Tests\TestCase;

class QrCodeDTOTest extends TestCase
{
    public function test_create_qr_code_dto_from_array(): void
    {
        $data = [
            'id' => 'qr_123456',
            'url' => 'https://example.com/qr',
        ];

        $dto = QrCodeResponseDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(QrCodeResponseDTO::class);
    }

    public function test_qr_code_dto_to_array(): void
    {
        $data = [
            'id' => 'qr_123456',
            'url' => 'https://example.com/qr',
        ];

        $dto = QrCodeResponseDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_qr_code_dto_validation(): void
    {
        $data = [
            'id' => 'qr_123456',
            'url' => 'https://example.com/qr',
        ];

        $dto = QrCodeResponseDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(QrCodeResponseDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}