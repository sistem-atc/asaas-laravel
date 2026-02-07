<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class Bank implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?string $ispb,
        public readonly ?string $code,
        public readonly ?string $name,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            ispb: $data['ispb'] ?? null,
            code: $data['code'] ?? null,
            name: $data['name'] ?? null,
        );
    }
}