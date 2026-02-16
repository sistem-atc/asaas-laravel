<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class PaymentBankSplit implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $identificationField = null,
        public readonly ?string $nossoNumero = null,
        public readonly ?string $barCode = null,
        public readonly ?string $bankSlipUrl = null,
        public readonly ?int $daysAfterDueDateToRegistrationCancellation = null,
    ) {}
}