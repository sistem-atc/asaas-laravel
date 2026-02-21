<?php

namespace SistemAtc\Asaas\DTO\Request\Webhook;

use SistemAtc\Asaas\Enum\SendType;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class CreateRequestDTO implements DTOInterface
{
    use AutoHydrate, CastToArray;

    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $url = null,
        public readonly ?string $email = null,
        public readonly ?bool $enabled = null,
        public readonly ?bool $interrupted = null,
        public readonly ?int $apiVersion = null,
        public readonly ?string $authToken = null,
        public readonly ?SendType $sendType = null,
         /** @var [] */ public readonly ?array $events = null,
    ) {}
}