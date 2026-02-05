<?php

namespace SistemAtc\Asaas\DTO\Response\AccountDocument;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Response\PendingDocument;

class CheckPendingDocumentsDTO implements DTOInterface
{

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

    public function toArray(): array
    {
        return array_filter([
            'rejectReasons' => $this->rejectReasons,
            'data' => $this->data ? array_map(static fn (PendingDocument $item) => $item->toArray(), $this->data) : null,
        ], fn($v) => !is_null($v));
    }
}