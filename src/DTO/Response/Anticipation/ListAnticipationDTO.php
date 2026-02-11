<?php

namespace SistemAtc\Asaas\DTO\Response\Anticipation;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

class ListAnticipationDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

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
}