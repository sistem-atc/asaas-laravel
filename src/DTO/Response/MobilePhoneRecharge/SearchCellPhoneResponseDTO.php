<?php

namespace SistemAtc\Asaas\DTO\Response\MobilePhoneRecharge;

use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\DTO\Shared\Common\CellPhoneCredits;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class SearchCellPhoneResponseDTO implements DTOInterface
{

    use CastToArray, AutoHydrate;

    public function __construct(
        public readonly ?string $name = null,
        #[ArrayOf(CellPhoneCredits::class)] public readonly ?array $values = null,
    ) {}
}