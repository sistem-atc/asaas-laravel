<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\States;
use SistemAtc\Asaas\Traits\CastToArray;

class City implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?string $object,
        public readonly ?string $id,
        public readonly ?string $ibgeCode,
        public readonly ?string $name,
        public readonly ?string $districtCode,
        public readonly ?string $district,
        public readonly ?States $state,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            object: $data['object'] ?? null,
            id: isset($data['id']) ? (string) $data['id'] : null,
            ibgeCode: $data['ibgeCode'] ?? null,
            name: $data['name'] ?? null,
            districtCode: $data['districtCode'] ?? null,
            district: $data['district'] ?? null,
            state: isset($data['state']) ? States::tryFrom($data['state']) : null,
        );
    }
}