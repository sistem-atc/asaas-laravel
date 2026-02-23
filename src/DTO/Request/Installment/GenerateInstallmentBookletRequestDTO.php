<?php

namespace SistemAtc\Asaas\DTO\Request\Installment;

use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class GenerateInstallmentBookletRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $sort = null,
        public readonly ?string $order = null,
    ) {}
}