<?php

namespace SistemAtc\Asaas\DTO\Request\FinancialTransaction;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class RetrieveExtractRequestDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?int $offset = 0,
        public readonly ?int $limit = 100,
        public readonly ?string $startDate = null,
        public readonly ?string $finishDate = null,
        public readonly ?string $order = null,
    ) {}
}