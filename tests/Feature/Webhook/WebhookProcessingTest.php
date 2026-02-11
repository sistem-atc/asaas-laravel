<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Event;
use SistemAtc\Asaas\Jobs\ProcessAsaasWebhook;
use SistemAtc\Asaas\Events\AsaasPaymentEvent;
use SistemAtc\Asaas\DTO\Webhook\PaymentWebhookDTO;

test('it processes the payload and dispatches the specialized payment event', function () {
    Event::fake();

    $payload = $this->getFixture('Webhook/payment');
    $job = new ProcessAsaasWebhook($payload, 'token-de-teste');
    $job->handle();
    
    Event::assertDispatched(AsaasPaymentEvent::class, function ($event) {
        return $event->type === 'PAYMENT_RECEIVED' 
            && $event->dto instanceof PaymentWebhookDTO
            && $event->dto->payment->id === 'pay_080225913252';
    });
});