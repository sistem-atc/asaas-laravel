<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;

class NotificationFees implements DTOInterface
{
    public function __construct(
        public readonly ?float $phoneCallFeeValue,
        public readonly ?float $whatsAppFeeValue,
        public readonly ?float $messagingFeeValue,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            phoneCallFeeValue: isset($data['phoneCallFeeValue']) ? (float) $data['phoneCallFeeValue'] : null,
            whatsAppFeeValue: isset($data['whatsAppFeeValue']) ? (float) $data['whatsAppFeeValue'] : null,
            messagingFeeValue: isset($data['messagingFeeValue']) ? (float) $data['messagingFeeValue'] : null,
        );
    }

    public function toArray(): array { 
        return array_filter(get_object_vars($this), fn($v) => !is_null($v)); 
    }

}