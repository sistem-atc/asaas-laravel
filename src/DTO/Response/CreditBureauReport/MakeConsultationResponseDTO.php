<?php

namespace SistemAtc\Asaas\DTO\Response\CreditBureauReport;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class MakeConsultationResponseDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $dateCreated = null,
        public readonly ?string $cpfCnpj = null,
        public readonly ?string $customer = null,
        public readonly ?string $downloadUrl = null,
        public readonly ?string $reportFile = null,
    ) {}
}