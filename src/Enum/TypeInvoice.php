<?php

namespace SistemAtc\Asaas\Enum;

enum TypeInvoice: string
{
    case NFSe = 'NFS-e';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::NFSe => 'Nota Fiscal de Serviço Eletrônica',
        };
    }
}
