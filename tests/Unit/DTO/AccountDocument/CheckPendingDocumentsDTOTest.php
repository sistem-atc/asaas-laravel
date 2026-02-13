<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\AccountDocument;

use SistemAtc\Asaas\DTO\Response\AccountDocument\CheckPendingDocumentsDTO;
use SistemAtc\Asaas\Tests\TestCase;

class CheckPendingDocumentsDTOTest extends TestCase
{
    public function test_create_check_pending_documents_dto_from_array(): void
    {
        $data = [
            'documents' => [],
        ];

        $dto = CheckPendingDocumentsDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(CheckPendingDocumentsDTO::class);
    }

    public function test_check_pending_documents_dto_to_array(): void
    {
        $data = [
            'documents' => [],
        ];

        $dto = CheckPendingDocumentsDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_check_pending_documents_dto_validation(): void
    {
        $data = [
            'documents' => [],
        ];

        $dto = CheckPendingDocumentsDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(CheckPendingDocumentsDTO::class);

        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}