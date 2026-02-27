<?php

use Illuminate\Support\Facades\Http;
use SistemAtc\Asaas\Facades\Asaas;
use SistemAtc\Asaas\Exceptions\AsaasRequestException;
use SistemAtc\Asaas\DTO\Request\Installment\RefundInstallmentRequestDTO;
use SistemAtc\Asaas\DTO\Request\Installment\CreateInstallmentRequestDTO;
use SistemAtc\Asaas\DTO\Request\Installment\ListInstallmentRequestDTO;
use SistemAtc\Asaas\DTO\Request\Installment\ListPaymentInstallmentRequestDTO;
use SistemAtc\Asaas\DTO\Request\Installment\UpdateSplitInstallmentRequestDTO;

test('it creates installment with valid payload and hydrates response', function () {
    Http::fake([
        'https://sandbox.asaas.com/api/v3/installments' => Http::response(
            $this->getFixture('Installment/create_installment_response'),
            200
        ),
    ]);

    $dto = CreateInstallmentRequestDTO::fromArray([
        'installmentCount' => 3,
        'customer' => 'cus_G7Dvo4iphUNk',
        'value' => 100.0,
        'billingType' => 'BOLETO',
        'dueDate' => '2025-07-08',
        'description' => 'Installment 08652',
    ]);

    $response = Asaas::installment()->createInstallment($dto);

    expect($response->id)->toBe('2765d086-c7c5-5cca-898a-4262d212587c')
        ->and($response->installmentCount)->toBe(12);
});

test('it lists installments with query filters', function () {
    Http::fake([
        'https://sandbox.asaas.com/api/v3/installments*' => Http::response(
            $this->getFixture('Installment/list_installments_response'),
            200
        ),
    ]);

    $query = ListInstallmentRequestDTO::fromArray([
        'offset' => 0,
        'limit' => 10,
    ]);

    $response = Asaas::installment()->listInstallmentsCreateInstallmentWithCreditCard($query);

    expect($response->totalCount)->toBe(2)
        ->and($response->data[0]->id)->toBe('2765d086-c7c5-5cca-898a-4262d212587c');
});

test('it lists payments from an installment', function () {
    Http::fake([
        'https://sandbox.asaas.com/api/v3/installments/*/payments*' => Http::response(
            $this->getFixture('Installment/list_payments_of_a_installment_response'),
            200
        ),
    ]);

    $query = ListPaymentInstallmentRequestDTO::fromArray([
        'status' => 'PENDING',
    ]);

    $response = Asaas::installment()->listPaymentsInstallment('ins_123', $query);

    expect($response->totalCount)->toBe(2)
        ->and($response->data[0]->id)->toBe('pay_080225913252');
});

test('it refunds installment and updates installment splits', function () {
    Http::fake([
        'https://sandbox.asaas.com/api/v3/installments/*/refund' => Http::response(
            $this->getFixture('Installment/refund_installment_response'),
            200
        ),
        'https://sandbox.asaas.com/api/v3/installments/*/splits' => Http::response(
            $this->getFixture('Installment/update_installment_splits_response'),
            200
        ),
    ]);

    $refund = RefundInstallmentRequestDTO::fromArray([
        'value' => 40.00,
    ]);
    $refundResponse = Asaas::installment()->refundInstallment('2765d086-c7c5-5cca-898a-4262d212587c', $refund);

    $update = UpdateSplitInstallmentRequestDTO::fromArray([
        'splits' => [
            [
                'walletId' => '7bafd95a-e783-4a62-9be1-23999af742c6',
                'fixedValue' => 20.32,
            ],
        ],
    ]);
    $updateResponse = Asaas::installment()->updateInstallmentSplits('2765d086-c7c5-5cca-898a-4262d212587c', $update);

    expect($refundResponse->id)->toBe('2765d086-c7c5-5cca-898a-4262d212587c')
        ->and($updateResponse->splits)->toBeArray()
        ->and($updateResponse->splits[0]->walletId)->toBe('7bafd95a-e783-4a62-9be1-23999af742c6');
});

test('it throws asaas request exception when installment api fails', function () {
    Http::fake([
        'https://sandbox.asaas.com/api/v3/installments' => Http::response([
            'errors' => [
                ['code' => 'invalid_installment', 'description' => 'Parcelamento invalido.'],
            ],
        ], 400),
    ]);

    $dto = CreateInstallmentRequestDTO::fromArray([
        'installmentCount' => 3,
        'customer' => 'cus_G7Dvo4iphUNk',
        'value' => 100.0,
        'billingType' => 'BOLETO',
        'dueDate' => '2025-07-08',
    ]);

    expect(fn () => Asaas::installment()->createInstallment($dto))
        ->toThrow(AsaasRequestException::class, 'Parcelamento invalido.');
});
