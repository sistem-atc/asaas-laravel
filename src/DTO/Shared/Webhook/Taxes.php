<?php

namespace SistemAtc\Asaas\DTO\Shared\Webhook;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class Taxes implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly bool $retainIss,
        public readonly float $iss,
        public readonly float $cofins,
        public readonly float $csll,
        public readonly float $inss,
        public readonly float $ir,
        public readonly float $pis,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            retainIss: (bool) ($data['retainIss'] ?? false),
            iss: (float) ($data['iss'] ?? 0),
            cofins: (float) ($data['cofins'] ?? 0),
            csll: (float) ($data['csll'] ?? 0),
            inss: (float) ($data['inss'] ?? 0),
            ir: (float) ($data['ir'] ?? 0),
            pis: (float) ($data['pis'] ?? 0),
        );
    }
}