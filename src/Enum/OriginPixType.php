<?php

namespace SistemAtc\Asaas\Enum;

enum OriginPixType: string
{
    case MANUAL = 'MANUAL';
    case ADDRESS_KEY = 'ADDRESS_KEY';
    case STATIC_QRCODE = 'STATIC_QRCODE';
    case DYNAMIC_QRCODE = 'DYNAMIC_QRCODE';
    case PAYMENT_INITIATION_SERVICE = 'PAYMENT_INITIATION_SERVICE';
    case AUTOMATIC_RECURRING = 'AUTOMATIC_RECURRING';
    
    public function getLabel(): string
    {
        return match ($this) {
            self::MANUAL => 'Manual',
            self::ADDRESS_KEY => 'Chave Pix',
            self::STATIC_QRCODE => 'QR Code Estático',
            self::DYNAMIC_QRCODE => 'QR Code Dinâmico',
            self::PAYMENT_INITIATION_SERVICE => 'Iniciador de Pagamentos (ITP)',
            self::AUTOMATIC_RECURRING => 'Pix Automático',
        };
    }
}