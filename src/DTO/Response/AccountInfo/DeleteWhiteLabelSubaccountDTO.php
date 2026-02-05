<?php

namespace SistemAtc\Asaas\DTO\Response\AccountInfo;

use SistemAtc\Asaas\Contracts\DTOInterface;

class DeleteWhiteLabelSubaccountDTO implements DTOInterface
{
    public function __construct(
        public readonly ?string $observations,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            observations: $data['observations'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter(
            get_object_vars($this), fn($v) => !is_null($v)
        );
    }
}