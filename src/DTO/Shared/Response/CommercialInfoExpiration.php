<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;

class CommercialInfoExpiration implements DTOInterface
{
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

    public function toArray(): array
    {
        return array_filter([
            'isExpired' => $this->isExpired,
            'scheduledDate' => $this->scheduledDate,
        ], fn($value) => !is_null($value));
    }
}
