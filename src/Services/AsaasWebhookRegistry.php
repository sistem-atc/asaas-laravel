<?php

namespace SistemAtc\Asaas\DTO\Factory;

use Illuminate\Support\Str;
use SistemAtc\Asaas\DTO\Webhook\BillWebhookDTO;
use SistemAtc\Asaas\DTO\Webhook\MobileWebhookDTO;
use SistemAtc\Asaas\DTO\Webhook\BalanceWebhookDTO;
use SistemAtc\Asaas\DTO\Webhook\InvoiceWebhookDTO;
use SistemAtc\Asaas\DTO\Webhook\PaymentWebhookDTO;
use SistemAtc\Asaas\DTO\Webhook\CheckoutWebhookDTO;
use SistemAtc\Asaas\DTO\Webhook\InternalWebhookDTO;
use SistemAtc\Asaas\DTO\Webhook\TransferWebhookDTO;
use SistemAtc\Asaas\DTO\Webhook\ReceivableWebhookDTO;
use SistemAtc\Asaas\DTO\Webhook\AccessTokenWebhookDTO;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;
use SistemAtc\Asaas\DTO\Webhook\SubscriptionWebhookDTO;
use SistemAtc\Asaas\DTO\Webhook\AccountStatusWebhookDTO;

class AsaasWebhookRegistry
{
    public static function map(array $payload): WebhookEventDTOInterface
    {
        $event = $payload['event'] ?? '';
        $prefix = Str::before($event, '_');

        return match (strtoupper($prefix)) {
            'PAYMENT'       => PaymentWebhookDTO::fromArray($payload),
            'SUBSCRIPTION'  => SubscriptionWebhookDTO::fromArray($payload),
            'INVOICE'       => InvoiceWebhookDTO::fromArray($payload),
            'TRANSFER'      => TransferWebhookDTO::fromArray($payload),
            'BILL'          => BillWebhookDTO::fromArray($payload),
            'RECEIVABLE'    => ReceivableWebhookDTO::fromArray($payload),
            'MOBILE'        => MobileWebhookDTO::fromArray($payload),
            'ACCOUNT'       => AccountStatusWebhookDTO::fromArray($payload),
            'CHECKOUT'      => CheckoutWebhookDTO::fromArray($payload),
            'BALANCE'       => BalanceWebhookDTO::fromArray($payload),
            'INTERNAL'      => InternalWebhookDTO::fromArray($payload),
            'ACCESS'        => AccessTokenWebhookDTO::fromArray($payload),
            default         => self::handleUnknownEvent($event),
        };
    }

    private static function handleUnknownEvent(string $event): never
    {
        logger()->error("Asaas Webhook: Evento desconhecido recebido: {$event}");
        throw new \InvalidArgumentException("Unsupported Asaas event: {$event}");
    }

}
