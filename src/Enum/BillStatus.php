<?php

namespace SistemAtc\Asaas\Enum;

enum BillStatus: string
{
    case PENDING = 'PENDING';
    case BANK_PROCESSING = 'BANK_PROCESSING';
    case PAID = 'PAID';
    case FAILED = 'FAILED';
    case CANCELLED = 'CANCELLED';
    case REFUNDED = 'REFUNDED';
    case AWAITING_CHECKOUT_RISK_ANALYSIS_REQUEST = 'AWAITING_CHECKOUT_RISK_ANALYSIS_REQUEST';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PENDING => 'Pendente',
            self::BANK_PROCESSING => 'Processando no Banco',
            self::PAID => 'Pago',
            self::FAILED => 'Falhou',
            self::CANCELLED => 'Cancelado',
            self::REFUNDED => 'Reembolsado',
            self::AWAITING_CHECKOUT_RISK_ANALYSIS_REQUEST => 'Aguardando Análise de Risco do Checkout',
        };
    }
}   