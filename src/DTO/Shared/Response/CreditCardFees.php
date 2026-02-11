<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

class CreditCardFees implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?float $operationValue = null,
        public readonly ?float $oneInstallmentPercentage = null,
        public readonly ?float $upToSixInstallmentsPercentage = null,
        public readonly ?float $upToTwelveInstallmentsPercentage = null,
        public readonly ?float $upToTwentyOneInstallmentsPercentage = null,
        public readonly ?float $discountOneInstallmentPercentage = null,
        public readonly ?float $discountUpToSixInstallmentsPercentage = null,
        public readonly ?float $discountUpToTwelveInstallmentsPercentage = null,
        public readonly ?float $discountUpToTwentyOneInstallmentsPercentage = null,
        public readonly ?string $discountExpiration = null,
        public readonly ?int $daysToReceive = null,
    ) {}
}