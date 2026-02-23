<?php

namespace SistemAtc\Asaas\DTO\Response\Pix;

use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class ListKeysResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        #[ArrayOf(PixAddressKeyResponseDTO::class)] public readonly ?array $data = null,
    ) {}
}