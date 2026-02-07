<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class Discount implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?float $value,
        public readonly ?int $dueDateLimitDays,
        public readonly ?string $limitedDate,
        public readonly ?string $type,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            value: isset($data['value']) ? (float) $data['value'] : null,
            dueDateLimitDays: isset($data['dueDateLimitDays']) ? (int) $data['dueDateLimitDays'] : null,
            limitedDate: $data['limitedDate'] ?? null,
            type: $data['type'] ?? null,
        );
    }
}