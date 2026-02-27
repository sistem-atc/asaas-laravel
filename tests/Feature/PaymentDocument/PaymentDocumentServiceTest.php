<?php

use Illuminate\Support\Facades\Http;
use SistemAtc\Asaas\Facades\Asaas;
use SistemAtc\Asaas\Enum\DocumentType;
use SistemAtc\Asaas\Exceptions\AsaasRequestException;
use SistemAtc\Asaas\DTO\Request\PaymentDocument\UploadPaymentDocumentRequestDTO;
use SistemAtc\Asaas\DTO\Request\PaymentDocument\UpdateSettingsDocumentRequestDTO;

test('it uploads payment document using multipart payload', function () {
    Http::fake([
        'https://sandbox.asaas.com/api/v3/payments/*/documents' => Http::response(
            $this->getFixture('PaymentDocuments/upload_payment_documents_response'),
            200
        ),
    ]);

    $dto = new UploadPaymentDocumentRequestDTO(
        availableAfterPayment: true,
        type: DocumentType::INVOICE,
        file: __DIR__ . '/../../Fixtures/Files/sample.pdf',
    );

    $response = Asaas::paymentDocument()->uploadPaymentDocuments('pay_080225913252', $dto);

    expect($response->id)->toBe('609a3f98-8db7-4a89-b511-de4c3be6d462')
        ->and($response->type)->toBe(DocumentType::INVOICE)
        ->and($response->deleted)->toBeFalse();

    Http::assertSent(function ($request) {
        return $request->method() === 'POST'
            && str_contains($request->url(), '/payments/pay_080225913252/documents')
            && str_contains($request->body(), 'name="availableAfterPayment"')
            && str_contains($request->body(), 'name="type"')
            && str_contains($request->body(), 'name="file"');
    });
});

test('it updates payment document settings', function () {
    Http::fake([
        'https://sandbox.asaas.com/api/v3/payments/*/documents/*' => Http::response(
            $this->getFixture('PaymentDocuments/update_settings_of_a_document_of_a_payment_response'),
            200
        ),
    ]);

    $dto = UpdateSettingsDocumentRequestDTO::fromArray(
        $this->getFixture('PaymentDocuments/update_settings_of_a_document_of_a_payment_request')
    );

    $response = Asaas::paymentDocument()->updateSettingsaDocumentPayment(
        'pay_080225913252',
        '609a3f98-8db7-4a89-b511-de4c3be6d462',
        $dto
    );

    expect($response->availableAfterPayment)->toBeTrue()
        ->and($response->type)->toBe(DocumentType::INVOICE);

    Http::assertSent(function ($request) {
        return $request->method() === 'PUT'
            && str_contains($request->url(), '/payments/pay_080225913252/documents/609a3f98-8db7-4a89-b511-de4c3be6d462');
    });
});

test('it throws asaas request exception when payment document api fails', function () {
    Http::fake([
        'https://sandbox.asaas.com/api/v3/payments/*/documents/*' => Http::response([
            'errors' => [
                ['code' => 'invalid_document', 'description' => 'Documento invalido.'],
            ],
        ], 400),
    ]);

    $dto = UpdateSettingsDocumentRequestDTO::fromArray([
        'availableAfterPayment' => true,
        'type' => 'INVOICE',
    ]);

    expect(fn () => Asaas::paymentDocument()->updateSettingsaDocumentPayment('pay_080225913252', 'doc_123', $dto))
        ->toThrow(AsaasRequestException::class, 'Documento invalido.');
});
