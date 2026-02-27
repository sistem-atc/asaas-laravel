<?php

use Illuminate\Support\Facades\Http;
use SistemAtc\Asaas\Facades\Asaas;
use SistemAtc\Asaas\Enum\StatusAnticipation;
use SistemAtc\Asaas\Exceptions\AsaasRequestException;
use SistemAtc\Asaas\DTO\Request\Anticipation\SimulateAnticipationRequestDTO;
use SistemAtc\Asaas\DTO\Request\Anticipation\ListAnticipationFilterRequestDTO;
use SistemAtc\Asaas\DTO\Request\Anticipation\UpdateAutomaticAnticipationRequestDTO;

test('it lists anticipations with filters', function () {
    Http::fake([
        'https://sandbox.asaas.com/api/v3/anticipations*' => Http::response(
            $this->getFixture('Anticipation/list_anticipations_response'),
            200
        ),
    ]);

    $filters = ListAnticipationFilterRequestDTO::fromArray([
        'offset' => 0,
        'limit' => 10,
        'status' => 'PENDING',
    ]);

    $response = Asaas::anticipation()->listAnticipations($filters);

    expect($response->totalCount)->toBe(2)
        ->and($response->data)->toBeArray()
        ->and($response->data[0]->status)->toBe(StatusAnticipation::PENDING);
});

test('it simulates anticipation and returns calculated values', function () {
    Http::fake([
        'https://sandbox.asaas.com/api/v3/anticipations/simulate' => Http::response(
            $this->getFixture('Anticipation/simulate_anticipation_response'),
            200
        ),
    ]);

    $simulate = SimulateAnticipationRequestDTO::fromArray(
        $this->getFixture('Anticipation/simulate_anticipation_request')
    );

    $response = Asaas::anticipation()->simulateAnticipation($simulate);

    expect($response->payment)->toBe('pay_626366773834')
        ->and($response->netValue)->toBe(73.68);
});

test('it updates automatic anticipation status', function () {
    Http::fake([
        'https://sandbox.asaas.com/api/v3/anticipations/configurations' => Http::response(
            $this->getFixture('Anticipation/update_status_of_automatic_anticipation_response'),
            200
        ),
    ]);

    $update = UpdateAutomaticAnticipationRequestDTO::fromArray(
        $this->getFixture('Anticipation/update_status_of_automatic_anticipation_request')
    );

    $updated = Asaas::anticipation()->updateStatusAutomaticAnticipation($update);

    expect($updated->creditCardAutomaticEnabled)->toBeTrue();

    Http::assertSent(function ($request) {
        $payload = $request->data();

        return $request->method() === 'PUT'
            && str_ends_with($request->url(), '/api/v3/anticipations/configurations')
            && ($payload['creditCardAutomaticEnabled'] ?? null) === true;
    });
});

test('it throws asaas request exception when anticipation api fails', function () {
    Http::fake([
        'https://sandbox.asaas.com/api/v3/anticipations*' => Http::response([
            'errors' => [
                ['code' => 'invalid_filter', 'description' => 'Filtro invalido.'],
            ],
        ], 400),
    ]);

    $filters = ListAnticipationFilterRequestDTO::fromArray([
        'offset' => 0,
        'limit' => 10,
    ]);

    expect(fn () => Asaas::anticipation()->listAnticipations($filters))
        ->toThrow(AsaasRequestException::class, 'Filtro invalido.');
});
