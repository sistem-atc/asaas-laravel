<?php

namespace SistemAtc\Asaas\DTO\Request\Installment;

use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Common\SplitRefunds;

final class RefundInstallmentRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?float $value = null,
        #[ArrayOf(SplitRefunds::class)] public readonly ?array $splitRefunds = null,
    ) {}
}