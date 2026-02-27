<?php

use Illuminate\Support\Facades\Http;
use SistemAtc\Asaas\Facades\Asaas;
use SistemAtc\Asaas\Enum\StatusPayment;
use SistemAtc\Asaas\Exceptions\AsaasRequestException;
use SistemAtc\Asaas\DTO\Request\Payment\ListPaymentRequestDTO;
use SistemAtc\Asaas\DTO\Request\Payment\RefundPaymentRequestDTO;
use SistemAtc\Asaas\DTO\Request\Payment\CreatePaymentRequestDTO;

test('it creates a payment with expected payload and returns hydrated dto', function () {
    Http::fake([
        'https://sandbox.asaas.com/api/v3/payments' => Http::response(
            $this->getFixture('Payment/create_payment_response'),
            200
        ),
    ]);

    $dto = CreatePaymentRequestDTO::fromArray([
        'customer' => 'cus_G7Dvo4iphUNk',
        'billingType' => 'BOLETO',
        'value' => 129.90,
        'dueDate' => '2017-06-10',
        'description' => 'Pedido 056984',
        'externalReference' => '056984',
    ]);
    $response = Asaas::payment()->createNewPayment($dto);

    expect($response->id)->toBe('pay_080225913252')
        ->and($response->status)->toBe(StatusPayment::PENDING);

    Http::assertSent(function ($request) {
        $payload = $request->data();

        return $request->method() === 'POST'
            && str_ends_with($request->url(), '/api/v3/payments')
            && $request->hasHeader('access_token', 'minha-chave-secreta')
            && ($payload['customer'] ?? null) === 'cus_G7Dvo4iphUNk';
    });
});

test('it lists payments and maps list response correctly', function () {
    Http::fake([
        'https://sandbox.asaas.com/api/v3/payments*' => Http::response(
            $this->getFixture('Payment/list_payment_response'),
            200
        ),
    ]);

    $query = ListPaymentRequestDTO::fromArray([
        'offset' => 0,
        'limit' => 10,
        'status' => 'PENDING',
    ]);

    $response = Asaas::payment()->listPayments($query);

    expect($response->totalCount)->toBe(2)
        ->and($response->data)->toBeArray()
        ->and($response->data[0]->id)->toBe('pay_080225913252');
});

test('it refunds a payment and hits the correct endpoint', function () {
    Http::fake([
        'https://sandbox.asaas.com/api/v3/payments/*/refund' => Http::response(
            $this->getFixture('Payment/refund_payment_response'),
            200
        ),
    ]);

    $refund = RefundPaymentRequestDTO::fromArray([
        'value' => 40.00,
        'description' => 'Refund parcial',
    ]);

    $response = Asaas::payment()->refundPayment('pay_080225913252', $refund);

    expect($response->id)->toBe('pay_080225913252');

    Http::assertSent(function ($request) {
        return $request->method() === 'POST'
            && str_ends_with($request->url(), '/api/v3/payments/pay_080225913252/refund');
    });
});

test('it throws asaas request exception when payment api fails', function () {
    Http::fake([
        'https://sandbox.asaas.com/api/v3/payments' => Http::response([
            'errors' => [
                ['code' => 'invalid_customer', 'description' => 'Cliente invalido.'],
            ],
        ], 400),
    ]);

    $dto = CreatePaymentRequestDTO::fromArray([
        'customer' => 'cus_G7Dvo4iphUNk',
        'billingType' => 'BOLETO',
        'value' => 129.90,
        'dueDate' => '2017-06-10',
    ]);

    expect(fn () => Asaas::payment()->createNewPayment($dto))
        ->toThrow(AsaasRequestException::class, 'Cliente invalido.');
});
