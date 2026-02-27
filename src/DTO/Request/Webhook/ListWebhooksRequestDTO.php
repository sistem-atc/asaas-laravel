<?php

namespace SistemAtc\Asaas\DTO\Request\Webhook;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class ListWebhooksRequestDTO implements DTOInterface
{
    use AutoHydrate, CastToArray;

    public function __construct(
        public readonly ?int $offset = 0,
        public readonly ?int $limit = 100,
    ) {}
}