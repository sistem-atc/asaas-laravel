<?php

namespace SistemAtc\Asaas\DTO\Request\PaymentDocument;

use InvalidArgumentException;
use SistemAtc\Asaas\Enum\DocumentType;
use SistemAtc\Asaas\Traits\CastToMultipart;
use SistemAtc\Asaas\Attributes\MultipartFile;
use SistemAtc\Asaas\Contracts\DTOInterfaceMultipart;

final class UploadPaymentDocumentRequestDTO implements DTOInterfaceMultipart
{
    use CastToMultipart;

    public function __construct(
        public readonly bool $availableAfterPayment,
        public readonly DocumentType $type,
        #[MultipartFile(as: 'file')] public readonly string $file,
    ) {
        if (!file_exists($this->file)) {
            throw new InvalidArgumentException("O arquivo não foi encontrado em: {$this->file}");
        }
    }
}