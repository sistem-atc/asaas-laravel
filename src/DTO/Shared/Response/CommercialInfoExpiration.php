<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class CommercialInfoExpiration implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly bool $isExpired,
        public readonly ?string $scheduledDate,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            isExpired: $data['isExpired'] ?? false,
            scheduledDate: $data['scheduledDate'] ?? null,
        );
    }
}