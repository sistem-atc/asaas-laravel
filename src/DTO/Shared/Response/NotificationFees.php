<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class NotificationFees implements DTOInterface
{

    use CastToArray;

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
}