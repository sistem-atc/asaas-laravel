<?php

use Illuminate\Support\Facades\Bus;
use SistemAtc\Asaas\Jobs\ProcessAsaasWebhook;

test('it dispatches WebhookReceived event when a valid post is made', function () {
    Bus::fake();
    
    $payload = [
        'event' => 'PAYMENT_CONFIRMED',
        'payment' => ['id' => 'pay_123']
    ];

    $this->postJson('api/asaas-events', $payload, [
        'asaas-access-token' => 'token-de-teste'
    ])->assertStatus(204);

    Bus::assertDispatched(ProcessAsaasWebhook::class, function ($job) use ($payload) {
        return $job->payload === $payload;
    });
});