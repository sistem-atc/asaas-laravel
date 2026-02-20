<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\Chargeback;

use SistemAtc\Asaas\Tests\TestCase;
use SistemAtc\Asaas\DTO\Request\Chargeback\CreateChargebackDisputeRequestDTO;

class CreateChargebackDisputeDTOTest extends TestCase
{
    public function test_create_create_chargeback_dispute_dto_from_array(): void
    {
        $filePath = tempnam(sys_get_temp_dir(), 'test');
        file_put_contents($filePath, 'test content');
        
        $dto = new CreateChargebackDisputeRequestDTO($filePath);
        expect($dto)->toBeInstanceOf(CreateChargebackDisputeRequestDTO::class);
    }

    public function test_create_chargeback_dispute_dto_to_multipart(): void
    {
        $filePath = tempnam(sys_get_temp_dir(), 'test');
        file_put_contents($filePath, 'test content');
        
        $dto = new CreateChargebackDisputeRequestDTO($filePath);
        $result = $dto->toMultipart();

        expect($result)->toBeArray()->not->toBeEmpty();
    }
    
    public function test_create_chargeback_dispute_dto_validation(): void
    {
        $filePath = tempnam(sys_get_temp_dir(), 'test');
        file_put_contents($filePath, 'test content');
        
        $dto = new CreateChargebackDisputeRequestDTO($filePath);
        expect($dto)->toBeInstanceOf(CreateChargebackDisputeRequestDTO::class);
        
        $result = $dto->toMultipart();
        expect($result)->toBeArray()->not->toBeEmpty();
    }
}