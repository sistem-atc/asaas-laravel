<?php

namespace SistemAtc\Asaas\DTO\Response\Invoice;

use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class ListInvoiceResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $object = null,
        public readonly ?bool $hasMore = null,
        public readonly ?int $totalCount = null,
        public readonly ?int $limit = null,
        public readonly ?int $offset = null,
        #[ArrayOf(InvoiceResponseDTO::class)] public readonly ?array $data = null,
    ) {}
}