<?php

namespace SistemAtc\Asaas\Tests\Unit\DTO\AccountDocument;

use SistemAtc\Asaas\DTO\Response\AccountDocument\RemoveDocumentsDTO;
use SistemAtc\Asaas\Tests\TestCase;

class RemoveDocumentsDTOTest extends TestCase
{
    public function test_create_remove_documents_dto_from_array(): void
    {
        $data = [
            'deleted' => true,
            'id' => 'uniqueID',
        ];

        $dto = RemoveDocumentsDTO::fromArray($data);

        expect($dto)->toBeInstanceOf(RemoveDocumentsDTO::class);
    }

    public function test_remove_documents_dto_to_array(): void
    {
        $data = [
            'deleted' => true,
            'id' => 'uniqueID',
        ];

        $dto = RemoveDocumentsDTO::fromArray($data);
        $result = $dto->toArray();

        expect($result)->toBeArray();
    }
    
    public function test_remove_documents_dto_validation(): void
    {
        $data = [
            'deleted' => true,
            'id' => 'uniqueID',
        ];

        $dto = RemoveDocumentsDTO::fromArray($data);
        expect($dto)->toBeInstanceOf(RemoveDocumentsDTO::class);
        
        $result = $dto->toArray();
        expect($result)->toBeArray();
    }
}