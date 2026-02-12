<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\Events\AsaasTransferEvent;
use SistemAtc\Asaas\DTO\Webhook\TransferWebhookDTO;

/**
 * @property TransferWebhookDTO $event
 */
class TransferHandler extends BaseAsaasHandler
{
    protected ?string $eventClass = AsaasTransferEvent::class;

    protected function expectedDTO(): string
    {
        return TransferWebhookDTO::class;
    }
}