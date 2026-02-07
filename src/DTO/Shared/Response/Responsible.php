<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Enum\TypeDocument;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class Responsible implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?string $name,
        public readonly ?TypeDocument $type,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? null,
            type: isset($data['type']) ? TypeDocument::tryFrom($data['type']) : null,
        );
    }
}
