<?php

namespace SistemAtc\Asaas\DTO\Response\PaymentDocument;

use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class ListPaymentDocumentResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly ?string $object,
        public readonly ?bool $hasMore,
        public readonly ?int $totalCount,
        public readonly ?int $limit,
        public readonly ?int $offset,
        #[ArrayOf(PaymentDocumentResponseDTO::class)] public readonly ?array $data,
    ) {}
}