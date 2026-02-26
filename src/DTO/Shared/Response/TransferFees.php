<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Response\TedFees;
use SistemAtc\Asaas\DTO\Shared\Response\PixTransferFees;

class TransferFees implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?int $monthlyTransfersWithoutFee = null,
        public readonly ?TedFees $ted = null,
        public readonly ?PixTransferFees $pix = null,
    ) {}
}