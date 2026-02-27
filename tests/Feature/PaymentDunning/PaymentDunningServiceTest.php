<?php

use Illuminate\Support\Facades\Http;
use SistemAtc\Asaas\Facades\Asaas;
use SistemAtc\Asaas\Enum\DunningType;
use SistemAtc\Asaas\Enum\StatusFinance;
use SistemAtc\Asaas\Exceptions\AsaasRequestException;
use SistemAtc\Asaas\DTO\Request\PaymentDunning\ListsDunningRequestDTO;
use SistemAtc\Asaas\DTO\Request\PaymentDunning\ResendDocumentRequestDTO;
use SistemAtc\Asaas\DTO\Request\PaymentDunning\PaymentDunningRequestDTO;
use SistemAtc\Asaas\DTO\Request\PaymentDunning\ListPaymentDunningRequestDTO;
use SistemAtc\Asaas\DTO\Request\PaymentDunning\SimulatePaymentDunningRequestDTO;

test('it creates payment dunning using multipart payload', function () {
    Http::fake([
        'https://sandbox.asaas.com/api/v3/paymentDunnings' => Http::response([
            'id' => 'dun_123',
            'status' => 'PENDING',
            'type' => 'CREDIT_BUREAU',
            'payment' => 'pay_123',
            'value' => 129.90,
        ], 200),
    ]);

    $dto = new PaymentDunningRequestDTO(
        payment: 'pay_123',
        type: DunningType::CREDIT_BUREAU,
        description: null,
        customerName: 'John Doe',
        customerCpfCnpj: '12345678901',
        customerPrimaryPhone: '11999999999',
        customerSecondaryPhone: null,
        customerPostalCode: '01001000',
        customerAddress: 'Rua Teste',
        customerAddressNumber: '100',
        customerComplement: null,
        customerProvince: 'Centro',
        documents: __DIR__ . '/../../Fixtures/Files/sample.pdf',
    );

    $response = Asaas::paymentDunning()->createPaymentDunning($dto);

    expect($response->id)->toBe('dun_123')
        ->and($response->type)->toBe(DunningType::CREDIT_BUREAU);

    Http::assertSent(function ($request) {
        return $request->method() === 'POST'
            && str_contains($request->url(), '/paymentDunnings')
            && str_contains($request->body(), 'name="payment"')
            && str_contains($request->body(), 'name="type"')
            && str_contains($request->body(), 'name="documents"');
    });
});

test('it resends payment dunning documents using multipart payload', function () {
    Http::fake([
        'https://sandbox.asaas.com/api/v3/paymentDunnings/*/documents' => Http::response([
            'id' => 'dun_123',
            'status' => 'PENDING',
            'type' => 'CREDIT_BUREAU',
            'payment' => 'pay_123',
        ], 200),
    ]);

    $dto = new ResendDocumentRequestDTO(
        documents: __DIR__ . '/../../Fixtures/Files/sample.pdf',
    );

    $response = Asaas::paymentDunning()->resendDocuments('dun_123', $dto);

    expect($response->id)->toBe('dun_123')
        ->and($response->type)->toBe(DunningType::CREDIT_BUREAU);

    Http::assertSent(function ($request) {
        return $request->method() === 'POST'
            && str_contains($request->url(), '/paymentDunnings/dun_123/documents')
            && str_contains($request->body(), 'name="documents"');
    });
});

test('it lists and simulates payment dunnings', function () {
    Http::fake(function ($request) {
        if (str_contains($request->url(), '/paymentDunnings/paymentsAvailableForDunning')) {
            return Http::response([
                'object' => 'list',
                'hasMore' => false,
                'totalCount' => 1,
                'limit' => 10,
                'offset' => 0,
                'data' => [[
                    'payment' => 'pay_123',
                    'customer' => 'cus_123',
                    'value' => 129.90,
                    'status' => 'PENDING',
                    'billingType' => 'BOLETO',
                    'dueDate' => '2026-02-20',
                    'typeSimulations' => [],
                ]],
            ], 200);
        }

        if (str_contains($request->url(), '/paymentDunnings') && $request->method() === 'GET') {
            return Http::response([
                'object' => 'list',
                'hasMore' => false,
                'totalCount' => 1,
                'limit' => 10,
                'offset' => 0,
                'data' => [[
                    'id' => 'dun_123',
                    'status' => 'PENDING',
                    'type' => 'CREDIT_BUREAU',
                    'payment' => 'pay_123',
                ]],
            ], 200);
        }

        if (str_contains($request->url(), '/paymentDunnings') && $request->method() === 'POST') {
            return Http::response([
                'payment' => 'pay_123',
                'value' => 129.90,
                'typeSimulations' => [],
            ], 200);
        }

        return Http::response([], 404);
    });

    $listQuery = ListPaymentDunningRequestDTO::fromArray([
        'offset' => 0,
        'limit' => 10,
        'status' => 'PENDING',
        'type' => 'CREDIT_BUREAU',
        'payment' => null,
        'requestStartDate' => null,
        'requestEndDate' => null,
    ]);

    $listResponse = Asaas::paymentDunning()->listPaymentDunnings($listQuery);

    expect($listResponse->totalCount)->toBe(1)
        ->and($listResponse->data[0]->id)->toBe('dun_123');

    $availableQuery = ListsDunningRequestDTO::fromArray([
        'offset' => 0,
        'limit' => 10,
    ]);

    $availableResponse = Asaas::paymentDunning()->listPaymentsAvailablePaymentDunning($availableQuery);

    expect($availableResponse->totalCount)->toBe(1)
        ->and($availableResponse->data[0]->status)->toBe(StatusFinance::PENDING);

    $simulate = SimulatePaymentDunningRequestDTO::fromArray([
        'payment' => 'pay_123',
    ]);
    $simulateResponse = Asaas::paymentDunning()->simulatePaymentDunning($simulate);

    expect($simulateResponse->payment)->toBe('pay_123');
});

test('it throws asaas request exception when payment dunning api fails', function () {
    Http::fake([
        'https://sandbox.asaas.com/api/v3/paymentDunnings*' => Http::response([
            'errors' => [
                ['code' => 'invalid_dunning', 'description' => 'Cobranca judicial invalida.'],
            ],
        ], 400),
    ]);

    $dto = ListPaymentDunningRequestDTO::fromArray([
        'offset' => 0,
        'limit' => 10,
        'status' => 'PENDING',
        'type' => 'CREDIT_BUREAU',
        'payment' => null,
        'requestStartDate' => null,
        'requestEndDate' => null,
    ]);

    expect(fn () => Asaas::paymentDunning()->listPaymentDunnings($dto))
        ->toThrow(AsaasRequestException::class, 'Cobranca judicial invalida.');
});
