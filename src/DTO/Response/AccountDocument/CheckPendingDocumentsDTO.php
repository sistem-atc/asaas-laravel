<?php

namespace SistemAtc\Asaas\DTO\Response\AccountDocument;

use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Response\PendingDocument;

class CheckPendingDocumentsDTO implements DTOInterface
{

    use CastToArray;
    
    /**
     * @param PendingDocument[]|null $data
     */
    public function __construct(
        public readonly ?string $rejectReasons,
        public readonly ?PendingDocument $data,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            rejectReasons: $data['rejectReasons'] ?? null,
            data: isset($data['data']) && is_array($data['data']) ? array_map(
                static fn (array $item) => PendingDocument::fromArray($item), $data['data']) : null,
        );
    }
}