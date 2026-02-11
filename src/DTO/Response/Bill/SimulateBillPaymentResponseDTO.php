<?php

namespace SistemAtc\Asaas\DTO\Response\Bill;

use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Response\BankSlipInfo;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

class SimulateBillPaymentResponseDTO extends DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $minimumScheduleDate = null,
        public readonly ?int $fee = null,
        #[ArrayOf(BankSlipInfo::class)] public readonly ?string $bankSlipInfo = null,
    ) {}
}