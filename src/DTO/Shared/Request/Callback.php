<?php

namespace SistemAtc\Asaas\DTO\Shared\Request;

use SistemAtc\Asaas\Contracts\DTOInterface;

class Callback implements DTOInterface
{
    public function __construct(
        public readonly string $successUrl,
        public readonly ?bool $autoRedirect,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            successUrl: $data['successUrl'],
            autoRedirect: $data['autoRedirect'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'successUrl' => $this->successUrl,
            'autoRedirect' => $this->autoRedirect,
        ], fn($value) => !is_null($value));
    }

}
