<?php

namespace SistemAtc\Asaas\DTO\Response\Pix;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Enum\PixAddressKeyType;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\PixAddressKeyStatus;
use SistemAtc\Asaas\DTO\Shared\Common\QrCode;

final class PixAddressKeyResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $key = null,
        public readonly ?PixAddressKeyType $type = null,
        public readonly ?PixAddressKeyStatus $status = null,
        public readonly ?string $dateCreated = null,
        public readonly ?bool $canBeDeleted = null,
        public readonly ?string $cannotBeDeletedReason = null,
        public readonly ?QrCode $qrCode = null,
    ) {}
}