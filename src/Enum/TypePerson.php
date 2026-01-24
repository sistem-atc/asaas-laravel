<?php

namespace SistemAtc\Asaas\Enum;

enum TypePerson: string
{
    case JURIDICA = 'JURIDICA';
    case FISICA = 'FISICA';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::JURIDICA => 'Juridica',
            self::FISICA => 'Fisica',
        };
    }
}
