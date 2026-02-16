<?php

namespace SistemAtc\Asaas\DTO\Request\Chargeback;

use InvalidArgumentException;
use SistemAtc\Asaas\Traits\CastToMultipart;
use SistemAtc\Asaas\Attributes\MultipartFile;
use SistemAtc\Asaas\Contracts\DTOInterfaceMultipart;

class CreateChargebackDisputeDTO implements DTOInterfaceMultipart
{
    use CastToMultipart;

    public function __construct(
        #[MultipartFile(as: 'file')] public readonly string $files,
    ) {
        if (!file_exists($this->files)) {
            throw new InvalidArgumentException("O arquivo não foi encontrado em: {$this->files}");
        }
    }
}
