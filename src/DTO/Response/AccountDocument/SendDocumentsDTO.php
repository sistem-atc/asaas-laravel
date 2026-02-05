<?php

namespace SistemAtc\Asaas\DTO\Response\AccountDocument;

use SistemAtc\Asaas\Enum\StatusDocument;
use SistemAtc\Asaas\Contracts\DTOInterface;

class SendDocumentsDTO implements DTOInterface
{
    
    public function __construct(
        public ?string $id,
        public ?StatusDocument $status,
    ) {}
    
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            status: isset($data['status']) ? StatusDocument::tryFrom($data['status']) : null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'id' => $this->id,
            'status' => $this->status?->value,
        ], fn($v) => !is_null($v));
    }
}