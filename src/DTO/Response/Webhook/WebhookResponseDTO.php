<?php

namespace SistemAtc\Asaas\DTO\Response\Webhook;

use SistemAtc\Asaas\Enum\SendType;
use SistemAtc\Asaas\Traits\AutoHydrate;
use SistemAtc\Asaas\Traits\CastToArray;
use SistemAtc\Asaas\Enum\WebhookEventAsaas;
use SistemAtc\Asaas\Contracts\DTOInterface;

final class WebhookResponseDTO implements DTOInterface
{
    use AutoHydrate, CastToArray;

    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $url = null,
        public readonly ?string $email = null,
        public readonly ?bool $enabled = null,
        public readonly ?bool $interrupted = null,
        public readonly ?int $apiVersion = null,
        public readonly ?bool $hasAuthToken = null,
        public readonly ?SendType $sendType = null,
        public readonly ?int $penalizedRequestsCount = null,
        /** @var WebhookEventAsaas[] */ public readonly ?array $events = null,
    ) {}
}