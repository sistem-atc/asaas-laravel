<?php

use Illuminate\Support\Facades\Event;
use SistemAtc\Asaas\Events\WebhookReceived;
use Illuminate\Support\Facades\Route;

test('it dispatches WebhookReceived event when a valid post is made', function () {
    Event::fake();
    
    $payload = [
        'event' => 'PAYMENT_CONFIRMED',
        'payment' => ['id' => 'pay_123']
    ];

    $this->postJson('api/asaas-events', $payload, [
        'asaas-access-token' => 'token-de-teste'
    ])->assertStatus(204);

    Event::assertDispatched(WebhookReceived::class, function ($event) use ($payload) {
        return $event->payload === $payload;
    });
});