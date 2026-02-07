<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class PaymentDunningFees implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?float $feeValue
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            feeValue: isset($data['feeValue']) ? (float) $data['feeValue'] : null
        );
    }
}