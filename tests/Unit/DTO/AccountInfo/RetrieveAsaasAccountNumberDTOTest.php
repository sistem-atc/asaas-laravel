<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\AccountInfo;

use SistemAtc\Asaas\DTO\Response\AccountInfo\RetrieveAsaasAccountNumberDTO;
use SistemAtc\Asaas\Tests\TestCase;

class RetrieveAsaasAccountNumberDTOTest extends TestCase
{
    public function test_create_retrieve_asaas_account_number_dto_from_array(): void
    {
        $data = [
            'accountNumber' => '123456789',
        ];

        $dto = RetrieveAsaasAccountNumberDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(RetrieveAsaasAccountNumberDTO::class);
    }

    public function test_retrieve_asaas_account_number_dto_to_array(): void
    {
        $data = [
            'accountNumber' => '123456789',
        ];

        $dto = RetrieveAsaasAccountNumberDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_retrieve_asaas_account_number_dto_validation(): void
    {
        $data = [
            'accountNumber' => '123456789',
        ];

        $dto = RetrieveAsaasAccountNumberDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(RetrieveAsaasAccountNumberDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}