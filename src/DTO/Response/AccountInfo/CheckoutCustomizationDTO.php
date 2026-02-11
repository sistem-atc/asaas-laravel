<?php

namespace SistemAtc\Asaas\DTO\Response\AccountInfo;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\StatusCheckoutCustomization;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

class CheckoutCustomizationDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $object,
        public readonly ?string $logoBackgroundColor,
        public readonly ?string $infoBackgroundColor,
        public readonly ?string $fontColor,
        public readonly ?bool $enabled,
        public readonly ?string $logoUrl,
        public readonly ?string $observations,
        public readonly ?StatusCheckoutCustomization $status,
    ) {}
}