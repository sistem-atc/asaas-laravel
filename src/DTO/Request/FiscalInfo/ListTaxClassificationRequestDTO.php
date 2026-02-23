<?php

namespace SistemAtc\Asaas\DTO\Request\FiscalInfo;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class ListTaxClassificationRequestDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?int $offset = 0,
        public readonly ?int $limit = 100,
        public readonly ?string $code = null,
        public readonly ?string $description = null,
        public readonly ?string $taxSituationCode = null,
    ) {}
}