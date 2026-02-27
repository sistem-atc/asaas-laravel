<?php

namespace SistemAtc\Asaas\DTO\Response\Subaccount;

use SistemAtc\Asaas\Attributes\ArrayOf;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class ListAccessTokenResponseDTO implements DTOInterface
{
    use AutoHydrate, CastToArray;

    public function __construct(
        #[ArrayOf(UpdateApiKeySubAccountResponseDTO::class)] public readonly ?array $accessTokens = null,
    ) {}
}