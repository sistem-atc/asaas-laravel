<?php

namespace SistemAtc\Asaas\DTO\Request\AccountInfo;

use InvalidArgumentException;
use SistemAtc\Asaas\Traits\CastToMultipart;
use SistemAtc\Asaas\Attributes\MultipartFile;
use SistemAtc\Asaas\Contracts\DTOInterfaceMultipart;

final class UpdateCheckoutCustomizationRequestDTO implements DTOInterfaceMultipart
{
    use CastToMultipart;

    public function __construct(
        public readonly string $logoBackgroundColor,
        public readonly string $infoBackgroundColor,
        public readonly string $fontColor,
        public readonly ?bool $enabled = null,
        #[MultipartFile(as: 'logoFile')] public readonly ?string $logoFilePath = null,
    ) {
        if ($this->logoFilePath && !file_exists($this->logoFilePath)) {
            throw new InvalidArgumentException("O arquivo de logo não foi encontrado em: {$this->logoFilePath}");
        }
    }
}