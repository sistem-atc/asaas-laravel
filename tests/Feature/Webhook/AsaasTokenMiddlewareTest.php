<?php

use Illuminate\Support\Facades\Route;

beforeEach(function () {
    Route::post('/test-webhook', function () {
        return response()->noContent();
    })->middleware(\SistemAtc\Asaas\Http\Middleware\AsaasTokenValid::class);
});

test('it blocks request with invalid asaas token', function () {
    $this->postJson('/test-webhook', [], [
        'asaas-access-token' => 'token-errado'
    ])->assertStatus(401);
});

test('it allows request with valid asaas token', function () {
    $this->postJson('/test-webhook', [], [
        'asaas-access-token' => 'token-de-teste'
    ])->assertStatus(204);
});