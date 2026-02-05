<?php

namespace SistemAtc\Asaas\Enum;

enum TypeCompany: string
{
    case MEI = 'MEI';
    case LIMITED = 'LIMITED';
    case INDIVIDUAL = 'INDIVIDUAL';
    case ASSOCIATION = 'ASSOCIATION';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::MEI => 'MEI',
            self::LIMITED => 'Limitada',
            self::INDIVIDUAL => 'Individual',
            self::ASSOCIATION => 'Associação',
        };
    }
}
