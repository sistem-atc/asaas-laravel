<?php

namespace SistemAtc\Asaas\DTO\Request\Anticipation;

use InvalidArgumentException;
use SistemAtc\Asaas\Attributes\MultipartFile;
use SistemAtc\Asaas\Contracts\DTOInterfaceMultipart;
use SistemAtc\Asaas\Traits\CastToMultipart;

class RequestAnticipationDTO implements DTOInterfaceMultipart
{
    use CastToMultipart;

    public function __construct(
        public readonly ?string $installment,
        public readonly ?string $payment,
        #[MultipartFile(as: 'documents')] public readonly ?string $documentFilePath,
    ) {
        if ($this->documentFilePath && !file_exists($this->documentFilePath)) {
            throw new InvalidArgumentException("O documento para antecipação não foi encontrado em: {$this->documentFilePath}");
        }
    }
}