<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

class BankSlipInfo implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $identificationField = null,
        public readonly ?float $value = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $companyName = null,
        public readonly ?string $bank = null,
        public readonly ?string $beneficiaryCpfCnpj = null,
        public readonly ?string $beneficiaryName = null,
        public readonly ?bool $allowChangeValue = null,
        public readonly ?float $minValue = null,
        public readonly ?float $maxValue = null,
        public readonly ?float $discountValue = null,
        public readonly ?float $interestValue = null,
        public readonly ?float $fineValue = null,
        public readonly ?float $originalValue = null,
        public readonly ?float $totalDiscountValue = null,
        public readonly ?float $totalAdditionalValue = null,
        public readonly ?bool $isOverdue = null,
    ) {}
}