<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class FileDocument implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $publicId = null,
        public readonly ?string $originalName = null,
        public readonly ?int $size = null,
        public readonly ?string $extension = null,
        public readonly ?string $previewUrl = null,
        public readonly ?string $downloadUrl = null,
    ) {}
}