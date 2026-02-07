<?php

namespace SistemAtc\Asaas\DTO\Response\AccountInfo;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\StatusCheckoutCustomization;
use SistemAtc\Asaas\Traits\CastToArray;

class CheckoutCustomizationDTO implements DTOInterface
{

    use CastToArray;

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

    public static function fromArray(array $data): self
    {
        return new self(
            object: $data['object'] ?? null,
            logoBackgroundColor: $data['logoBackgroundColor'] ?? null,
            infoBackgroundColor: $data['infoBackgroundColor'] ?? null,
            fontColor: $data['fontColor'] ?? null,
            enabled: isset($data['enabled']) ? (bool) $data['enabled'] : null,
            logoUrl: $data['logoUrl'] ?? null,
            observations: $data['observations'] ?? null,
            status: isset($data['status']) ? StatusCheckoutCustomization::tryFrom($data['status']) : null,
        );
    }
}