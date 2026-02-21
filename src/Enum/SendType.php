<?php

namespace SistemAtc\Asaas\Enum;

enum SendType: string
{
    case NON_SEQUENTIALLY = 'NON_SEQUENTIALLY';
    case SEQUENTIALLY = 'SEQUENTIALLY';

    public function getLabel(): string
    {
        return match ($this) {
            self::NON_SEQUENTIALLY => 'Não sequencial',
            self::SEQUENTIALLY => 'Sequencial',
        };
    }
}