<?php

namespace SistemAtc\Asaas\Enum;

enum InvoiceIssuancePeriod: string
{
    case ON_PAYMENT_CONFIRMATION = 'ON_PAYMENT_CONFIRMATION';
    case ON_PAYMENT_DUE_DATE = 'ON_PAYMENT_DUE_DATE';
    case BEFORE_PAYMENT_DUE_DATE = 'BEFORE_PAYMENT_DUE_DATE';
    case ON_DUE_DATE_MONTH = 'ON_DUE_DATE_MONTH';
    case ON_NEXT_MONTH = 'ON_NEXT_MONTH';

    public function getLabel(): string
    {
        return match ($this) {
            self::ON_PAYMENT_CONFIRMATION => 'Na confirmação do pagamento',
            self::ON_PAYMENT_DUE_DATE     => 'No vencimento do pagamento',
            self::BEFORE_PAYMENT_DUE_DATE => 'Antes do vencimento do pagamento',
            self::ON_DUE_DATE_MONTH       => 'No mês de vencimento',
            self::ON_NEXT_MONTH           => 'No mês seguinte',
        };
    }
}