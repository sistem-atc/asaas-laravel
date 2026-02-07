<?php

namespace SistemAtc\Asaas\DTO\Response\AccountInfo;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Response\WalletDTO;
use SistemAtc\Asaas\Traits\CastToArray;

class RetrieveWalletIdDTO implements DTOInterface
{

    use CastToArray;
    
    /**
     * @param WalletDTO[]|null $data
     */
    public function __construct(
        public readonly ?string $object,
        public readonly ?bool $hasMore,
        public readonly ?int $totalCount,
        public readonly ?int $limit,
        public readonly ?int $offset,
        public readonly ?array $data,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            object: $data['object'] ?? null,
            hasMore: isset($data['hasMore']) ? (bool) $data['hasMore'] : null,
            totalCount: $data['totalCount'] ?? null,
            limit: $data['limit'] ?? null,
            offset: $data['offset'] ?? null,
            data: isset($data['data']) 
                ? array_map(fn($item) => WalletDTO::fromArray($item), $data['data']) 
                : [],
        );
    }
}