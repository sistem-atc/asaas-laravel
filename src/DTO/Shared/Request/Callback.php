<?php

namespace SistemAtc\Asaas\DTO\Shared\Request;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class Callback implements DTOInterface
{

    use CastToArray;
    
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
}
