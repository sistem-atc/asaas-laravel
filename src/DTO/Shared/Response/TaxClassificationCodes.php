<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

class TaxClassificationCodes implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $code = null,
        public readonly ?string $description = null,
        public readonly ?string $effectiveStartDate = null,
        public readonly ?string $expirationDate = null,
        public readonly ?bool $isSubjectRegularTaxation = null,
        public readonly ?float $cbsPercentage = null,
        public readonly ?float $municipalIbsTaxPercentage = null,
        public readonly ?float $stateIbsTaxPercentage = null,
        public readonly ?float $cbsTaxReductionPercentage = null,
        public readonly ?float $ibsTaxReductionPercentage = null,
        public readonly ?string $taxRegimeType = null,
        public readonly ?TaxSituation $taxSituation = null,
    ) {}
}
