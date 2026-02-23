<?php

namespace SistemAtc\Asaas\Enum;

enum PixAddressKeyStatus: string
{
    case AWAITING_ACTIVATION = 'AWAITING_ACTIVATION';
    case ACTIVE = 'ACTIVE';
    case AWAITING_DELETION = 'AWAITING_DELETION';
    case AWAITING_ACCOUNT_DELETION = 'AWAITING_ACCOUNT_DELETION';
    case DELETED = 'DELETED';
    case ERROR = 'ERROR';

public function getLabel(): string
    {
        return match ($this) {
            self::AWAITING_ACTIVATION => 'Aguardando Ativação',
            self::ACTIVE => 'Ativa',
            self::AWAITING_DELETION => 'Aguardando Exclusão',
            self::AWAITING_ACCOUNT_DELETION => 'Aguardando Exclusão da Conta',
            self::DELETED => 'Excluída',
            self::ERROR => 'Erro',
        };
    }
}
