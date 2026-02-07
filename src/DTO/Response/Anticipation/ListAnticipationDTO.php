<?php

namespace SistemAtc\Asaas\DTO\Response\Anticipation;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class ListAnticipationDTO implements DTOInterface
{

    use CastToArray;

    /**
     * @param RetrieveAnticipationDTO[] $data
     */
    public function __construct(
        public readonly string $object,
        public readonly bool $hasMore,
        public readonly int $totalCount,
        public readonly int $limit,
        public readonly int $offset,
        public readonly array $data,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            object: $data['object'] ?? 'list',
            hasMore: (bool) ($data['hasMore'] ?? false),
            totalCount: (int) ($data['totalCount'] ?? 0),
            limit: (int) ($data['limit'] ?? 0),
            offset: (int) ($data['offset'] ?? 0),
            data: array_map(fn($item) => RetrieveAnticipationDTO::fromArray($item), $data['data'] ?? []),
        );
    }
}