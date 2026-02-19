<?php

namespace SistemAtc\Asaas\Enum;

enum OriginType: string
{
    case IMMEDIATE_PAYMENT_AND_RECURRING_QR_CODE = 'IMMEDIATE_PAYMENT_AND_RECURRING_QR_CODE';
    case PAYMENT_AND_RECURRING_OFFER_QR_CODE = 'PAYMENT_AND_RECURRING_OFFER_QR_CODE';
    
    public function getLabel(): string
    {
        return match ($this) {
            self::IMMEDIATE_PAYMENT_AND_RECURRING_QR_CODE => 'Pagamento QRCode Imediato e com recorrencia',
            self::PAYMENT_AND_RECURRING_OFFER_QR_CODE => 'Codigo QR de Pagamento e oferta de recorrencia',
        };
    }
}