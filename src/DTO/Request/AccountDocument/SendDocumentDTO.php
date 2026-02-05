<?php

namespace SistemAtc\Asaas\DTO\Request\AccountDocument;

use InvalidArgumentException;
use SistemAtc\Asaas\Enum\TypePendingDocument;
use SistemAtc\Asaas\Contracts\DTOInterfaceMultipart;

class SendDocumentDTO implements DTOInterfaceMultipart
{
    public function __construct(
        public readonly string $filePath,
        public readonly ?TypePendingDocument $type,
    ) {
        if (!file_exists($this->filePath)) {
            throw new InvalidArgumentException("O arquivo não foi encontrado em: {$this->filePath}");
        }
    }

    public function toMultipart(): array
    {
        $multipart = [
            [
                'name'     => 'documentFile',
                'contents' => fopen($this->filePath, 'r'),
            ],
        ];

        if ($this->type) {
            $multipart[] = [
                'name'     => 'type',
                'contents' => $this->type->value,
            ];
        }

        return $multipart;
    }
}
