<?php

namespace SistemAtc\Asaas\DTO\Request\PixTransaction;

use SistemAtc\Asaas\Enum\QrCodeTransaction;
use SistemAtc\Asaas\Enum\StatusQrCode;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

class ListTransactionsRequestDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?int $offset = 0,
        public readonly ?int $limit = 100,
        public readonly ?StatusQrCode $status = null,
        public readonly ?QrCodeTransaction $type = null,
        public readonly ?string $endToEndIdentifier = null,
    ) {}
}