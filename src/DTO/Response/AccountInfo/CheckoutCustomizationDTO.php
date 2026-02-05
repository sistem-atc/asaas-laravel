<?php

namespace SistemAtc\Asaas\DTO\Response\AccountInfo;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Enum\StatusCheckoutCustomization;

class CheckoutCustomizationDTO implements DTOInterface
{
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

    public function toArray(): array
    {
        return array_filter([
            'object'              => $this->object,
            'logoBackgroundColor' => $this->logoBackgroundColor,
            'infoBackgroundColor' => $this->infoBackgroundColor,
            'fontColor'           => $this->fontColor,
            'enabled'             => $this->enabled,
            'logoUrl'             => $this->logoUrl,
            'observations'        => $this->observations,
            'status'              => $this->status?->value,
        ], fn($v) => !is_null($v));
    }
}