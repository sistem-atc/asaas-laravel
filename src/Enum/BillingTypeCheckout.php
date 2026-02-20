<?php

namespace SistemAtc\Asaas\Enum;

enum BillingTypeCheckout: string
{
    case CREDIT_CARD = 'CREDIT_CARD';
    case PIX = 'PIX';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::CREDIT_CARD => 'Cartão de Crédito',
            self::PIX => 'Pix',
        };
    }
}
