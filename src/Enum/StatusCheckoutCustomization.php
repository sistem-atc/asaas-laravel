<?php

namespace SistemAtc\Asaas\Enum;

enum StatusCheckoutCustomization: string
{
    case AWAITING_APPROVAL = 'AWAITING_APPROVAL';
    case APPROVED = 'APPROVED';
    case REJECTED = 'REJECTED';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::AWAITING_APPROVAL => 'Aguardando Aprovação',
            self::APPROVED => 'Aprovado',
            self::REJECTED => 'Rejeitado',
        };
    }
}