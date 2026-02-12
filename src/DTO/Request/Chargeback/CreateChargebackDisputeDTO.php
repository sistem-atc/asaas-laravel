<?php

namespace SistemAtc\Asaas\DTO\Request\AccountDocument;

use InvalidArgumentException;
use SistemAtc\Asaas\Traits\CastToMultipart;
use SistemAtc\Asaas\Attributes\MultipartFile;
use SistemAtc\Asaas\Contracts\DTOInterfaceMultipart;

class CreateChargebackDisputeDTO implements DTOInterfaceMultipart
{
    use CastToMultipart;

    public function __construct(
        #[MultipartFile(as: 'file')] public readonly string $file,
    ) {
        if (!file_exists($this->file)) {
            throw new InvalidArgumentException("O arquivo não foi encontrado em: {$this->file}");
        }
    }
}
