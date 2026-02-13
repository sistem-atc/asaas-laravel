<?php

namespace SistemAtc\Asaas\Enum;

enum FinishReason: string
{
    case CHARGEBACK = 'CHARGEBACK';
    case EXPIRED = 'EXPIRED';
    case INSUFFICIENT_BALANCE = 'INSUFFICIENT_BALANCE';
    case PAYMENT_REFUNDED = 'PAYMENT_REFUNDED';
    case REQUESTED_BY_CUSTOMER = 'REQUESTED_BY_CUSTOMER';
    case CUSTOMER_CONFIG_DISABLED = 'WALLET_UNABLE_TO_RECEIVE';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::CHARGEBACK => 'Contestação',
            self::EXPIRED => 'Expirado',
            self::INSUFFICIENT_BALANCE => 'Saldo Insuficiente',
            self::PAYMENT_REFUNDED => 'Pagamento Estornado',
            self::REQUESTED_BY_CUSTOMER => 'Solicitado pelo Cliente',
            self::CUSTOMER_CONFIG_DISABLED => 'Configuração do Cliente Desabilitada',
        };
    }
}
