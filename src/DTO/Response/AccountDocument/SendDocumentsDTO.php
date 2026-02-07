<?php

namespace SistemAtc\Asaas\DTO\Response\AccountDocument;

use SistemAtc\Asaas\Enum\StatusDocument;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class SendDocumentsDTO implements DTOInterface
{
    
    use CastToArray;

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
}