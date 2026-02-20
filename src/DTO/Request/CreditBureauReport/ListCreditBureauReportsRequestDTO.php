<?php

namespace SistemAtc\Asaas\DTO\Request\CreditBureauReport;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class ListCreditBureauReportsRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?int $offset = 0,
        public readonly ?int $limit = 100,
        public readonly ?string $startDate = null,
        public readonly ?string $endDate = null,
    ) {}
}