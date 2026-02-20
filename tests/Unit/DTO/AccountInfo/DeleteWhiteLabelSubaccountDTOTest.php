<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\AccountInfo;

use SistemAtc\Asaas\DTO\Response\AccountInfo\DeleteWhiteLabelSubaccountResponseDTO;
use SistemAtc\Asaas\Tests\TestCase;

class DeleteWhiteLabelSubaccountDTOTest extends TestCase
{
    public function test_create_delete_white_label_subaccount_dto_from_array(): void
    {
        $data = [
            'success' => true,
        ];

        $dto = DeleteWhiteLabelSubaccountResponseDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(DeleteWhiteLabelSubaccountResponseDTO::class);
    }

    public function test_delete_white_label_subaccount_dto_to_array(): void
    {
        $data = [
            'success' => true,
        ];

        $dto = DeleteWhiteLabelSubaccountResponseDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_delete_white_label_subaccount_dto_validation(): void
    {
        $data = [
            'success' => true,
        ];

        $dto = DeleteWhiteLabelSubaccountResponseDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(DeleteWhiteLabelSubaccountResponseDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}