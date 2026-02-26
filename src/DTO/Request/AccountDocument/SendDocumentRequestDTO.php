<?php

namespace SistemAtc\Asaas\DTO\Request\AccountDocument;

use InvalidArgumentException;
use SistemAtc\Asaas\Traits\CastToMultipart;
use SistemAtc\Asaas\Attributes\MultipartFile;
use SistemAtc\Asaas\Enum\TypePendingDocument;
use SistemAtc\Asaas\Contracts\DTOInterfaceMultipart;

final class SendDocumentRequestDTO implements DTOInterfaceMultipart
{
    use CastToMultipart;

    public function __construct(
        #[MultipartFile(as: 'documentFile')] public readonly string $filePath,
        public readonly ?TypePendingDocument $type = null,
    ) {
        if (!file_exists($this->filePath)) {
            throw new InvalidArgumentException("O arquivo não foi encontrado em: {$this->filePath}");
        }
    }
}
