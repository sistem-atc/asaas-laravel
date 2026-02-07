<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class AnticipationBankSlip implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?float $total,
        public readonly ?float $available,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            total: isset($data['total']) ? (float) $data['total'] : null,
            available: isset($data['available']) ? (float) $data['available'] : null,
        );
    }
}