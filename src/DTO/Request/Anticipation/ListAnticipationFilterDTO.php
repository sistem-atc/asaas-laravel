<?php

namespace SistemAtc\Asaas\DTO\Request\Anticipation;

use Carbon\Traits\Cast;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\AnticipationStatus;
use SistemAtc\Asaas\Traits\CastToArray;

class ListAnticipationFilterDTO implements DTOInterface
{
    use CastToArray;
    
    public function __construct(
        public readonly ?int $offset = null,
        public readonly ?int $limit = null,
        public readonly ?string $payment = null,
        public readonly ?string $installment = null,
        public readonly ?AnticipationStatus $status = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            offset: $data['offset'] ?? null,
            limit: $data['limit'] ?? null,
            payment: $data['payment'] ?? null,
            installment: $data['installment'] ?? null,
            status: isset($data['status']) ? AnticipationStatus::tryFrom($data['status']) : null,
        );
    }
}