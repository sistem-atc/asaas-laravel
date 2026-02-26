<?php

namespace SistemAtc\Asaas\Enum;

enum StatusQrCode: string
{
    case AWAITING_BALANCE_VALIDATION = 'AWAITING_BALANCE_VALIDATION';
    case AWAITING_INSTANT_PAYMENT_ACCOUNT_BALANCE = 'AWAITING_INSTANT_PAYMENT_ACCOUNT_BALANCE';
    case AWAITING_CRITICAL_ACTION_AUTHORIZATION = 'AWAITING_CRITICAL_ACTION_AUTHORIZATION';
    case AWAITING_CHECKOUT_RISK_ANALYSIS_REQUEST = 'AWAITING_CHECKOUT_RISK_ANALYSIS_REQUEST';
    case AWAITING_CASH_IN_RISK_ANALYSIS_REQUEST = 'AWAITING_CASH_IN_RISK_ANALYSIS_REQUEST';
    case SCHEDULED = 'SCHEDULED';
    case AWAITING_REQUEST = 'AWAITING_REQUEST';
    case REQUESTED = 'REQUESTED';
    case DONE = 'DONE';
    case REFUSED = 'REFUSED';
    case CANCELLED = 'CANCELLED';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::AWAITING_BALANCE_VALIDATION              => 'Aguardando validação de saldo',
            self::AWAITING_INSTANT_PAYMENT_ACCOUNT_BALANCE => 'Aguardando saldo na conta de pagamentos instantâneos',
            self::AWAITING_CRITICAL_ACTION_AUTHORIZATION   => 'Aguardando autorização de ação crítica',
            self::AWAITING_CHECKOUT_RISK_ANALYSIS_REQUEST  => 'Aguardando análise de risco do checkout',
            self::AWAITING_CASH_IN_RISK_ANALYSIS_REQUEST   => 'Aguardando análise de risco de entrada de valor',
            self::SCHEDULED                                => 'Agendado',
            self::AWAITING_REQUEST                         => 'Aguardando solicitação',
            self::REQUESTED                                => 'Solicitado',
            self::DONE                                     => 'Concluído',
            self::REFUSED                                  => 'Recusado',
            self::CANCELLED                                => 'Cancelado',
        };
    }
}
