<?php

namespace SistemAtc\Asaas\Enum;

enum DiscountType: string
{
    case FIXED = 'FIXED';
    case PERCENTAGE = 'PERCENTAGE';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::FIXED      => 'Fixo',
            self::PERCENTAGE => 'Percentual',
        };
    }
}
