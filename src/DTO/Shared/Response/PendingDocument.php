<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Enum\StatusDocument;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\TypePendingDocument;
use SistemAtc\Asaas\DTO\Shared\Response\Documents;
use SistemAtc\Asaas\Traits\CastToArray;

class PendingDocument implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?string $id,
        public readonly ?StatusDocument $status,
        public readonly ?TypePendingDocument $type,
        public readonly ?string $title,
        public readonly ?string $description,
        public readonly ?Responsible $responsible,
        public readonly ?string $onboardingUrl,
        public readonly ?string $onboardingUrlExpirationDate,
        public readonly ?Documents $documents,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            status: isset($data['status']) ? StatusDocument::tryFrom($data['status']) : null,
            type: isset($data['type']) ? TypePendingDocument::tryFrom($data['status']) : null,
            title: $data['title'] ?? null,
            description: $data['description'] ?? null,
            responsible: isset($data['responsible']) && is_array($data['responsible']) ? Responsible::fromArray($data['responsible']) : null,
            onboardingUrl: $data['onboardingUrl'] ?? null,
            onboardingUrlExpirationDate: $data['onboardingUrlExpirationDate'] ?? null,
            documents: isset($data['documents']) && is_array($data['documents']) ? Documents::fromArray($data['documents']) : null,
        );
    }
}