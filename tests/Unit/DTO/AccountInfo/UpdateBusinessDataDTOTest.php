<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\AccountInfo;

use SistemAtc\Asaas\DTO\Request\AccountInfo\UpdateBusinessDataDTO;
use SistemAtc\Asaas\Tests\TestCase;

class UpdateBusinessDataDTOTest extends TestCase
{
    public function test_create_update_business_data_dto_from_array(): void
    {
        $data = [
            'companyName' => 'Test Company',
            'companyType' => 'INDIVIDUAL',
        ];

        $dto = UpdateBusinessDataDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(UpdateBusinessDataDTO::class);
    }

    public function test_update_business_data_dto_to_array(): void
    {
        $data = [
            'companyName' => 'Test Company',
            'companyType' => 'INDIVIDUAL',
        ];

        $dto = UpdateBusinessDataDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_update_business_data_dto_validation(): void
    {
        $data = [
            'companyName' => 'Test Company',
            'companyType' => 'INDIVIDUAL',
        ];

        $dto = UpdateBusinessDataDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(UpdateBusinessDataDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}