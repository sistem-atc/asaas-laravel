<?php

namespace SistemAtc\Asaas\DTO\Shared\Response;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\CastToArray;

class AnticipationCreditCard implements DTOInterface
{

    use CastToArray;

    public function __construct(
        public readonly ?float $total,
        public readonly ?float $avaliable,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            total: isset($data['total']) ? (float) $data['total'] : null,
            avaliable: isset($data['avaliable']) ? (float) $data['avaliable'] : null,
        );
    }
}