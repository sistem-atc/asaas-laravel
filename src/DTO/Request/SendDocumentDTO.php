<?php

namespace SistemAtc\Asaas\DTO\Request;

use SistemAtc\Asaas\Enum\TypePendingDocument;

class SendDocumentDTO
{
    public function __construct(
        public readonly string $filePath,
        public readonly TypePendingDocument $type,
    ) {}

    public function toMultipart(): array
    {
        return [
            [
                'name'     => 'documentFile',
                'contents' => fopen($this->filePath, 'r'),
            ],
            [
                'name'     => 'type',
                'contents' => $this->type->value,
            ],
        ];
    }
}
