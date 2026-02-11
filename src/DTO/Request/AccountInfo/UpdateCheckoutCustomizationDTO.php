<?php

namespace SistemAtc\Asaas\DTO\Request\AccountInfo;

use InvalidArgumentException;
use SistemAtc\Asaas\Attributes\MultipartFile;
use SistemAtc\Asaas\Contracts\DTOInterfaceMultipart;
use SistemAtc\Asaas\Traits\CastToMultipart;

class UpdateCheckoutCustomizationDTO implements DTOInterfaceMultipart
{
    use CastToMultipart;

    public function __construct(
        public readonly ?string $logoBackgroundColor,
        public readonly ?string $infoBackgroundColor,
        public readonly ?string $fontColor,
        public readonly ?bool $enabled,
        #[MultipartFile(as: 'logoFile')] public readonly ?string $logoFilePath = null,
    ) {
        if ($this->logoFilePath && !file_exists($this->logoFilePath)) {
            throw new InvalidArgumentException("O arquivo de logo não foi encontrado em: {$this->logoFilePath}");
        }
    }
}