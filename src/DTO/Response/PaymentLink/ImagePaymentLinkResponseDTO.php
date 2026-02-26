<?php

namespace SistemAtc\Asaas\DTO\Response\PaymentLink;

use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\DTO\Shared\Common\Image;

final class ImagePaymentLinkResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;
    
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?bool $main = null,
        public readonly ?Image $image = null,
    ) {}
}