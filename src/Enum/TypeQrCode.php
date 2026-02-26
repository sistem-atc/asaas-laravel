<?php

namespace SistemAtc\Asaas\Enum;

enum TypeQrCode: string
{
    case DEBIT = 'DEBIT';
    case CREDIT = 'CREDIT';
    case CREDIT_REFUND = 'CREDIT_REFUND';
    case DEBIT_REFUND = 'DEBIT_REFUND';
    case DEBIT_REFUND_CANCELLATION = 'DEBIT_REFUND_CANCELLATION';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::DEBIT                       => 'Débito',
            self::CREDIT                      => 'Crédito',
            self::CREDIT_REFUND               => 'Estorno de Crédito',
            self::DEBIT_REFUND                => 'Estorno de Débito',
            self::DEBIT_REFUND_CANCELLATION   => 'Cancelamento de Estorno de Débito',
        };
    }
}
