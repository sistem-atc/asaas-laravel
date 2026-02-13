<?php

namespace SistemAtc\Asaas\Enum;

enum BillingTypeList: string
{
    case UNDEFINIED = 'UNDEFINIED';
    case BOLETO = 'BOLETO';
    case CREDIT_CARD = 'CREDIT_CARD';
    case DEBIT_CARD = 'DEBIT_CARD';
    case TRANSFER = 'TRANSFER';
    case DEPOSIT = 'DEPOSIT';
    case PIX = 'PIX';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::UNDEFINIED => 'Nao Definido',
            self::BOLETO => 'Boleto',
            self::CREDIT_CARD => 'Cartão de Crédito',
            self::DEBIT_CARD => 'Cartão de Débito',
            self::TRANSFER => 'Tranferencia',
            self::DEPOSIT => 'Deposito',
            self::PIX => 'Pix',
        };
    }
}
