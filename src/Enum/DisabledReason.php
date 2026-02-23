<?php

namespace SistemAtc\Asaas\Enum;

enum DisabledReason: string
{
    case WALLET_UNABLE_TO_RECEIVE = 'WALLET_UNABLE_TO_RECEIVE';
    case VALUE_DIVERGENCE = 'VALUE_DIVERGENCE';

    public function getLabel(): string
    {
        return match ($this) {
            self::WALLET_UNABLE_TO_RECEIVE => 'Carteira impossibilitada de receber',
            self::VALUE_DIVERGENCE => 'Divergência de valores',
        };
    }
}