<?php

namespace SistemAtc\Asaas\DTO\Request\PaymentLink;

use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class ListPaymentLinkRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly ?int $offset = 0,
        public readonly ?int $limit = 100,
        public readonly ?bool $active = null,
        public readonly ?bool $includeDeleted = null,
        public readonly ?string $name,
        public readonly ?string $externalReference,
    ) {}
}
