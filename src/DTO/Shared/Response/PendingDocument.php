<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Enum\StatusDocument;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\TypePendingDocument;
use SistemAtc\Asaas\DTO\Shared\Response\Documents;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

class PendingDocument implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $id = null,
        public readonly ?StatusDocument $status = null,
        public readonly ?TypePendingDocument $type = null,
        public readonly ?string $title = null,
        public readonly ?string $description = null,
        public readonly ?Responsible $responsible = null,
        public readonly ?string $onboardingUrl = null,
        public readonly ?string $onboardingUrlExpirationDate = null,
        public readonly ?Documents $documents = null,
    ) {}
}