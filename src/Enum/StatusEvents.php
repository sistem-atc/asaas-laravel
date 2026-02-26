<?php

namespace SistemAtc\Asaas\Enum;

enum StatusEvents: string
{
    case IN_NEGOTIATION = 'IN_NEGOTIATION';
    case NEGOTIATION_FAIL = 'NEGOTIATION_FAIL';
    case NEGOTIATED = 'NEGOTIATED';
    case PAID = 'PAID';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::IN_NEGOTIATION => 'Em Negociação',
            self::NEGOTIATION_FAIL => 'Negociação Falhou',
            self::NEGOTIATED => 'Negociado',
            self::PAID => 'Pago',
        };
    }
}
