<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Response\TedFees;
use SistemAtc\Asaas\DTO\Shared\Response\PixTransferFees;
use SistemAtc\Asaas\Traits\CastToArray;

class TransferFees implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?int $monthlyTransfersWithoutFee,
        public readonly ?TedFees $ted,
        public readonly ?PixTransferFees $pix,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            monthlyTransfersWithoutFee: $data['monthlyTransfersWithoutFee'] ?? null,
            ted: isset($data['ted']) ? ($data['ted'] instanceof TedFees ? $data['ted'] : TedFees::fromArray($data['ted'])) : null,
            pix: isset($data['pix']) ? ($data['pix'] instanceof PixTransferFees ? $data['pix'] : PixTransferFees::fromArray($data['pix'])) : null,
        );
    }
}