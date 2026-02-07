<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Enum\StatusMobile;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class Mobile implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?string $id,
        public readonly ?float $value,
        public readonly ?string $phoneNumber,
        public readonly ?StatusMobile $status,
        public readonly bool $canBeCancelled,
        public readonly ?string $operatorName,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            value: isset($data['value']) ? (float) $data['value'] : null,
            phoneNumber: $data['phoneNumber'] ?? null,
            status: isset($data['status']) ? StatusMobile::tryFrom($data['status']) : null,
            canBeCancelled: (bool) ($data['canBeCancelled'] ?? false),
            operatorName: $data['operatorName'] ?? null,
        );
    }
}