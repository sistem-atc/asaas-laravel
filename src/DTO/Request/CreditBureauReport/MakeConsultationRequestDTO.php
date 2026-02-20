<?php

namespace SistemAtc\Asaas\DTO\Request\CreditBureauReport;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class MakeConsultationRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $customer = null,
        public readonly ?string $cpfCnpj = null,
    ) {}
}