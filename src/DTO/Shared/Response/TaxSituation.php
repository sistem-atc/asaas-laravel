<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class TaxSituation implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $code = null,
        public readonly ?string $description = null,
        public readonly ?bool $isSubjectToIbsCbsTaxation = null,
        public readonly ?bool $isBaseReductionPercentApplicable = null,
        public readonly ?bool $isDefermentApplicable = null,
    ) {}
}
