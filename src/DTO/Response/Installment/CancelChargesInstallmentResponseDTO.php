<?php

namespace SistemAtc\Asaas\DTO\Response\Installment;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Common\CancelInstallment;

final class CancelChargesInstallmentResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?bool $deleted = null,
        public readonly ?string $id = null,
        #[ArrayOf(CancelInstallment::class)] public readonly ?array $deletedPayments = null,
    ) {}
}