<?php

namespace SistemAtc\Asaas\DTO\Response\AccountInfo;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class DeleteWhiteLabelSubaccountDTO implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?string $observations,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            observations: $data['observations'] ?? null,
        );
    }
}