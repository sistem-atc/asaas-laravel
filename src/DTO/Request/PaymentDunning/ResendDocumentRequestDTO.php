<?php

namespace SistemAtc\Asaas\DTO\Request\PaymentDunning;

use SistemAtc\Asaas\Traits\CastToMultipart;
use SistemAtc\Asaas\Attributes\MultipartFile;
use SistemAtc\Asaas\Contracts\DTOInterfaceMultipart;

final class ResendDocumentRequestDTO implements DTOInterfaceMultipart
{
    use CastToMultipart;

    public function __construct(
        #[MultipartFile(as: 'documents')] public readonly string $documents,
    ) {}
}