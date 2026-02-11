<?php

namespace SistemAtc\Asaas\DTO\Response\AccountInfo;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Response\WalletDTO;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

class RetrieveWalletIdDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;
    
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
}