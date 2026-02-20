<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\AccountInfo;

use SistemAtc\Asaas\DTO\Response\AccountInfo\RetrieveWalletIdResponseDTO;
use SistemAtc\Asaas\Tests\TestCase;

class RetrieveWalletIdDTOTest extends TestCase
{
    public function test_create_retrieve_wallet_id_dto_from_array(): void
    {
        $data = [
            'walletId' => 'wal_123456',
        ];

        $dto = RetrieveWalletIdResponseDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(RetrieveWalletIdResponseDTO::class);
    }

    public function test_retrieve_wallet_id_dto_to_array(): void
    {
        $data = [
            'walletId' => 'wal_123456',
        ];

        $dto = RetrieveWalletIdResponseDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_retrieve_wallet_id_dto_validation(): void
    {
        $data = [
            'walletId' => 'wal_123456',
        ];

        $dto = RetrieveWalletIdResponseDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(RetrieveWalletIdResponseDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}