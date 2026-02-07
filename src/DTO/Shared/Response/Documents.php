<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Enum\StatusDocument;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class Documents implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?string $id,
        public readonly ?StatusDocument $status,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            status: isset($data['status']) ? StatusDocument::tryFrom($data['status']) : null,
        );
    }
}