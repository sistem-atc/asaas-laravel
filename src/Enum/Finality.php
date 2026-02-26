<?php

namespace SistemAtc\Asaas\Enum;

enum Finality: string
{
    case WITHDRAWAL = 'WITHDRAWAL';
    case CHANGE = 'CHANGE';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::WITHDRAWAL => 'Pix Saque',
            self::CHANGE     => 'Pix Troco',
        };
    }
}
