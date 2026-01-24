<?php

namespace SistemAtc\Asaas\Enum;

enum StatusPayment: string
{
    case PENDING = 'PENDING';
    case RECEIVED = 'RECEIVED';
    case CONFIRMED = 'CONFIRMED';
    case OVERDUE = 'OVERDUE';
    case REFUNDED = 'REFUNDED';
    case RECEIVED_IN_CASH = 'RECEIVED_IN_CASH';
    case REFUND_REQUESTED = 'REFUND_REQUESTED';
    case REFUND_IN_PROGRESS = 'REFUND_IN_PROGRESS';
    case CHARGEBACK_REQUESTED = 'CHARGEBACK_REQUESTED';
    case CHARGEBACK_DISPUTE = 'CHARGEBACK_DISPUTE';
    case AWAITING_CHARGEBACK_REVERSAL = 'AWAITING_CHARGEBACK_REVERSAL';
    case DUNNING_REQUESTED = 'DUNNING_REQUESTED';
    case DUNNING_RECEIVED = 'DUNNING_RECEIVED';
    case AWAITING_RISK_ANALYSIS = 'AWAITING_RISK_ANALYSIS';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PENDING => 'Pendente',
            self::RECEIVED => 'Recebido',
            self::CONFIRMED => 'Confirmado',
            self::OVERDUE => 'Vencido',
            self::REFUNDED => 'Estornado',
            self::RECEIVED_IN_CASH => 'Recebido em Dinheiro',
            self::REFUND_REQUESTED => 'Estorno Solicitado',
            self::REFUND_IN_PROGRESS => 'Estorno em Processamento',
            self::CHARGEBACK_REQUESTED => 'Chargeback Solicitado',
            self::CHARGEBACK_DISPUTE => 'Chargeback em Disputa',
            self::AWAITING_CHARGEBACK_REVERSAL => 'Aguardando Reversão de Chargeback',
            self::DUNNING_REQUESTED => 'Negativação Solicitada',
            self::DUNNING_RECEIVED => 'Negativação Recebida',
            self::AWAITING_RISK_ANALYSIS => 'Aguardando Análise de Risco',
        };
    }
}
