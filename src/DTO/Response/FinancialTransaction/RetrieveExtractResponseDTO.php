<?php

namespace SistemAtc\Asaas\DTO\Response\FinancialTransaction;

use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

final class RetrieveExtractResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $object = null,
        public readonly ?bool $hasMore = null,
        public readonly ?int $totalCount = null,
        public readonly ?int $limit = null,
        public readonly ?int $offset = null,
        #[ArrayOf(ExtractResponseDTO::class)] public readonly ?array $data = null,
    ) {}
}