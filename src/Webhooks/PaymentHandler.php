<?php

namespace SistemAtc\Asaas\Webhooks;

use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\Events\WebhookReceived;
use SistemAtc\Asaas\Traits\HandlesIdempotency;
use SistemAtc\Asaas\DTO\Webhook\PaymentWebhookDTO;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;

/**
 * @property PaymentWebhookDTO $event
 */
class PaymentHandler extends BaseAsaasHandler
{

    use HandlesIdempotency;

    public function __invoke(WebhookEventDTOInterface $eventDTO, string $method): void
    {
        $this->setEvent($eventDTO);
        if ($this->wasAlreadyProcessed($this->event->id)) return;
        if (method_exists($this, $method)) $this->{$method}();
    }

    public function created(): void
    {
        event(new WebhookReceived($this->event));
    }

    public function riskAnalysis(): void
    {
        event(new WebhookReceived($this->event));
    }

    public function approvedByRiskAnalysis(): void
    {
        event(new WebhookReceived($this->event));
    }

    public function reprovedByRiskAnalysis(): void
    {
        event(new WebhookReceived($this->event));
    }

    public function authorized(): void
    {
        event(new WebhookReceived($this->event));
    }

    public function updated(): void
    {
        event(new WebhookReceived($this->event));
    }

    public function confirmed(): void
    {
        event(new WebhookReceived($this->event));
    }

    public function received(): void
    {
        event(new WebhookReceived($this->event));
    }

    public function creditCardCaptureRefuse(): void
    {
        event(new WebhookReceived($this->event));
    }

    public function anticipated(): void
    {
        event(new WebhookReceived($this->event));
    }

    public function overdue(): void
    {
        event(new WebhookReceived($this->event));
    }

    public function deleted(): void
    {
        event(new WebhookReceived($this->event));
    }

    public function restored(): void
    {
        event(new WebhookReceived($this->event));
    }

    public function refunded(): void
    {
        event(new WebhookReceived($this->event));
    }

    public function partiallyRefunded(): void
    {
        event(new WebhookReceived($this->event));
    }
    public function refundInProgress(): void
    {
        event(new WebhookReceived($this->event));
    }

    public function receivedInCashUndone(): void
    {
        event(new WebhookReceived($this->event));
    }

    public function chargebackRequested(): void
    {
        event(new WebhookReceived($this->event));
    }

    public function chargebackDispute(): void
    {
        event(new WebhookReceived($this->event));
    }
    public function awaitingChargebackReversal(): void
    {
        event(new WebhookReceived($this->event));
    }

    public function dunnignReceived(): void
    {
        event(new WebhookReceived($this->event));
    }
    public function dunnignRequested(): void
    {
        event(new WebhookReceived($this->event));
    }
    public function bankSlipViewed(): void
    {
        event(new WebhookReceived($this->event));
    }

    public function checkoutViewed(): void
    {
        event(new WebhookReceived($this->event));
    }
    public function splitCancelled(): void
    {
        event(new WebhookReceived($this->event));
    }

    public function splitDivergenceBlock(): void
    {
        event(new WebhookReceived($this->event));
    }

    public function splitDivergenceBlockFinished(): void
    {
        event(new WebhookReceived($this->event));
    }

}
