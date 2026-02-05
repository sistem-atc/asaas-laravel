<?php

namespace SistemAtc\Asaas\DTO\Request\AccountInfo;

use InvalidArgumentException;
use SistemAtc\Asaas\Contracts\DTOInterfaceMultipart;

class UpdateCheckoutCustomizationDTO implements DTOInterfaceMultipart
{
    public function __construct(
        public readonly ?string $logoBackgroundColor,
        public readonly ?string $infoBackgroundColor,
        public readonly ?string $fontColor,
        public readonly ?bool $enabled,
        public readonly ?string $logoFilePath = null,
    ) {
        if ($this->logoFilePath && !file_exists($this->logoFilePath)) {
            throw new InvalidArgumentException("O arquivo de logo não foi encontrado em: {$this->logoFilePath}");
        }
    }

    public function toMultipart(): array
    {
        $multipart = [];
        $properties = get_object_vars($this);

        foreach ($properties as $name => $value) {

            if ($name === 'logoFilePath' || is_null($value)) continue;
            
            if (!is_null($value)) {
                $multipart[] = [
                    'name'     => $name,
                    'contents' => is_bool($value) ? ($value ? 'true' : 'false') : $value,
                ];
            }
        }

        if ($this->logoFilePath) {
            $fileData = file_get_contents($this->logoFilePath);
            $fileName = basename($this->logoFilePath);
            $mimeType = mime_content_type($this->logoFilePath);

            $base64Contents = "data:{$mimeType};name={$fileName};base64," . base64_encode($fileData);

            $multipart[] = [
                'name'     => 'logoFile',
                'filename' => $fileName,
                'contents' => $base64Contents
            ];
        }

        return $multipart;
    }
}