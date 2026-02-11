<?php

namespace SistemAtc\Asaas\DTO\Request\Anticipation;

use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;

class UpdateAutomaticAnticipationDTO implements DTOInterface
{
    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly bool $creditCardAutomaticEnabled = false,
    ) {}
}