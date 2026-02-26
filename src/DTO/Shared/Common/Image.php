<?php

namespace SistemAtc\Asaas\DTO\Shared\Common;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class Image implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $originalName = null,
        public readonly ?int $size = null,
        public readonly ?string $extension = null,
        public readonly ?string $previewUrl = null,
        public readonly ?string $downloadUrl = null,
    ) {}
}