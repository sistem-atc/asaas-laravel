<?php

namespace SistemAtc\Asaas\Enum;

enum CancelationPayment: string
{
    case PAYMENT_DELETED = 'PAYMENT_DELETED';
    case PAYMENT_OVERDUE = 'PAYMENT_OVERDUE';
    case PAYMENT_RECEIVED_IN_CASH = 'PAYMENT_RECEIVED_IN_CASH';
    case PAYMENT_REFUNDED = 'PAYMENT_REFUNDED';
    case VALUE_DIVERGENCE_BLOCK = 'VALUE_DIVERGENCE_BLOCK';
    case WALLET_UNABLE_TO_RECEIVE = 'WALLET_UNABLE_TO_RECEIVE';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PAYMENT_DELETED => 'Pagamento Removido',
            self::PAYMENT_OVERDUE => 'Pagamento Vencido',
            self::PAYMENT_RECEIVED_IN_CASH => 'Recebido em Dinheiro',
            self::PAYMENT_REFUNDED => 'Estornado',
            self::VALUE_DIVERGENCE_BLOCK => 'Bloqueado por Divergência de Valor',
            self::WALLET_UNABLE_TO_RECEIVE => 'Carteira Inabilitada para Receber',
        };
    }
}
