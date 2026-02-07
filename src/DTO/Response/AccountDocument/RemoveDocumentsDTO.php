<?php

namespace SistemAtc\Asaas\DTO\Response\AccountDocument;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class RemoveDocumentsDTO implements DTOInterface
{
    
    use CastToArray;

    public function __construct(
        public bool $deleted,
        public ?string $id,
    ) {}
    
    public static function fromArray(array $data): self
    {
        return new self(
            deleted: $data['deleted'] ?? false,
            id: $data['id'] ?? null,
        );
    }
}