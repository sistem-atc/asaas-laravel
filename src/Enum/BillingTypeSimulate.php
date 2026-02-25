<?php

namespace SistemAtc\Asaas\Enum;

enum BillingTypeSimulate: string
{
    case UNDEFINED = 'UNDEFINED';
    case BOLETO = 'BOLETO';
    case CREDIT_CARD = 'CREDIT_CARD';
    case MUNDIPAGG_CIELO = 'MUNDIPAGG_CIELO';
    case TRANSFER = 'TRANSFER';
    case DEPOSIT = 'DEPOSIT';
    case DEBIT_CARD = 'DEBIT_CARD';
    case PIX = 'PIX';
    case VOUCHER_CARD = 'VOUCHER_CARD';
    case ASAAS_MONEY = 'ASAAS_MONEY';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::UNDEFINED => 'Não Definido',
            self::BOLETO => 'Boleto',
            self::CREDIT_CARD => 'Cartão de Crédito',
            self::MUNDIPAGG_CIELO => 'Cartão de Crédito (Mundipagg/Cielo)',
            self::TRANSFER => 'Transferência Bancária',
            self::DEPOSIT => 'Depósito',
            self::DEBIT_CARD => 'Cartão de Débito',
            self::PIX => 'Pix',
            self::VOUCHER_CARD => 'Cartão de Benefício (Voucher)',
            self::ASAAS_MONEY => 'Asaas Money',
        };
    }
}
