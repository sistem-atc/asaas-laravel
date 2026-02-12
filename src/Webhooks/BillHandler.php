<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Events\AsaasBillEvent;
use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\DTO\Webhook\BillWebhookDTO;

/**
 * @property BillWebhookDTO $event
 */
class BillHandler extends BaseAsaasHandler
{
    protected ?string $eventClass = AsaasBillEvent::class;

    protected function expectedDTO(): string
    {
        return BillWebhookDTO::class;
    }
}
