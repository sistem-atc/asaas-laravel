<?php

namespace SistemAtc\Asaas\DTO\Response\AccountDocument;

use SistemAtc\Asaas\Contracts\DTOInterface;

class RemoveDocumentsDTO implements DTOInterface
{
    
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

    public function toArray(): array
    {
        return array_filter([
            'deleted' => $this->deleted,
            'id' => $this->id,
        ], fn($v) => !is_null($v));
    }
}