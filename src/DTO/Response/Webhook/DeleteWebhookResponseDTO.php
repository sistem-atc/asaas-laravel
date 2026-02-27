<?php

namespace SistemAtc\Asaas\DTO\Response\Webhook;

use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class DeleteWebhookResponseDTO implements DTOInterface
{
    use AutoHydrate, CastToArray;

    public function __construct(
        public readonly ?bool $deleted = null,
        public readonly ?string $id = null,
    ) {}
}