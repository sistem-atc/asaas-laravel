<?php

namespace SistemAtc\Asaas\DTO\Request\Anticipation;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class SimulateAnticipationDTO implements DTOInterface
{
    use CastToArray;

    public function __construct(
        public readonly ?string $installment,
        public readonly ?string $payment,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            installment: $data['installment'] ?? null,
            payment: $data['payment'] ?? null,
        );
    }
}