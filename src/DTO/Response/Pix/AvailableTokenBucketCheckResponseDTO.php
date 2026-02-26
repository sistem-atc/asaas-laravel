<?php

namespace SistemAtc\Asaas\DTO\Response\Pix;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class AvailableTokenBucketCheckResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?int $capacity = null,
        public readonly ?int $remaining = null,
    ) {}
}