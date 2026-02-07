<?php

namespace SistemAtc\Asaas\DTO\Request\Anticipation;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class UpdateAutomaticAnticipationDTO implements DTOInterface
{
    use CastToArray;

    public function __construct(
        public readonly bool $creditCardAutomaticEnabled,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            creditCardAutomaticEnabled: (bool) ($data['creditCardAutomaticEnabled'] ?? false),
        );
    }
}