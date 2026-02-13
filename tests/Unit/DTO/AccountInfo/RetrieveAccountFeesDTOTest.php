<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\AccountInfo;

use SistemAtc\Asaas\DTO\Response\AccountInfo\RetrieveAccountFeesDTO;
use SistemAtc\Asaas\Tests\TestCase;

class RetrieveAccountFeesDTOTest extends TestCase
{
    public function test_create_retrieve_account_fees_dto_from_array(): void
    {
        $data = [
            'fees' => [],
        ];

        $dto = RetrieveAccountFeesDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(RetrieveAccountFeesDTO::class);
    }

    public function test_retrieve_account_fees_dto_to_array(): void
    {
        $data = [
            'fees' => [],
        ];

        $dto = RetrieveAccountFeesDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_retrieve_account_fees_dto_validation(): void
    {
        $data = [
            'fees' => [],
        ];

        $dto = RetrieveAccountFeesDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(RetrieveAccountFeesDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}