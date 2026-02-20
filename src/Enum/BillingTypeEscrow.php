<?php

namespace SistemAtc\Asaas\Enum;

enum BillingTypeEscrow: string
{
    case UNDEFINIED = 'UNDEFINIED';
    case BOLETO = 'BOLETO';
    case DEBIT_CARD = 'DEBIT_CARD';
    case CREDIT_CARD = 'CREDIT_CARD';
    case TRANSFER = 'TRANSFER';
    case DEPOSIT = 'DEPOSIT';
    case PIX = 'PIX';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::UNDEFINIED => 'Nao Definido',
            self::BOLETO => 'Boleto',
            self::DEBIT_CARD => 'Cartão de Débito',
            self::CREDIT_CARD => 'Cartão de Crédito',
            self::TRANSFER => 'Transfêrencia',
            self::DEPOSIT => 'Depósito',
            self::PIX => 'Pix',
        };
    }
}
