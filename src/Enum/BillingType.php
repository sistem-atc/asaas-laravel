<?php

namespace SistemAtc\Asaas\Enum;

enum BillingType: string
{
    //case UNDEFINIED = 'UNDEFINIED';
    //case BOLETO = 'BOLETO';
    case CREDIT_CARD = 'CREDIT_CARD';
    case PIX = 'PIX';

    public function getLabel(): ?string
    {
        return match ($this) {
            //self::UNDEFINIED => 'Nao Definido',
            //self::BOLETO => 'Boleto',
            self::CREDIT_CARD => 'Cartão de Crédito',
            self::PIX => 'Pix',
        };
    }
}
