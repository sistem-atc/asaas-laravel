<?php

use Illuminate\Support\Facades\Http;
use SistemAtc\Asaas\Facades\Asaas;
use SistemAtc\Asaas\Enum\StatusTransfer;
use SistemAtc\Asaas\Enum\TransferType;
use SistemAtc\Asaas\Exceptions\AsaasRequestException;
use SistemAtc\Asaas\DTO\Request\Transfer\ListTransferRequestDTO;
use SistemAtc\Asaas\DTO\Request\Transfer\TransferAsaasAccountRequestDTO;
use SistemAtc\Asaas\DTO\Request\Transfer\TransferAnotherInstitutionRequestDTO;

test('it transfers to asaas account', function () {
    Http::fake([
        'https://sandbox.asaas.com/api/v3/transfers' => Http::response([
            'object' => 'transfer',
            'id' => 'trf_asaas_123',
            'type' => 'INTERNAL',
            'status' => 'PENDING',
            'value' => 150.0,
            'walletId' => 'wal_123',
        ], 200),
    ]);

    $dto = TransferAsaasAccountRequestDTO::fromArray([
        'value' => 150.0,
        'walletId' => 'wal_123',
        'externalReference' => 'transfer-asaas-1',
    ]);

    $response = Asaas::transfer()->transferAsaasAccount($dto);

    expect($response->id)->toBe('trf_asaas_123')
        ->and($response->status)->toBe(StatusTransfer::PENDING)
        ->and($response->type)->toBe(TransferType::INTERNAL);
});

test('it transfers to another institution or pix key', function () {
    Http::fake([
        'https://sandbox.asaas.com/api/v3/transfers' => Http::response([
            'object' => 'transfer',
            'id' => 'trf_ext_123',
            'type' => 'PIX',
            'status' => 'DONE',
            'value' => 90.0,
            'netValue' => 88.5,
            'operationType' => 'PIX',
        ], 200),
    ]);

    $dto = TransferAnotherInstitutionRequestDTO::fromArray([
        'value' => 90.0,
        'operationType' => 'PIX',
        'pixAddressKey' => 'user@example.com',
        'pixAddressKeyType' => 'EMAIL',
        'description' => 'Repasse parceiro',
    ]);

    $response = Asaas::transfer()->transferAnotherInstitutionAccountOrPixKey($dto);

    expect($response->id)->toBe('trf_ext_123')
        ->and($response->status)->toBe(StatusTransfer::DONE)
        ->and($response->type)->toBe(TransferType::PIX);
});

test('it lists transfers with filters', function () {
    Http::fake([
        'https://sandbox.asaas.com/api/v3/transfers*' => Http::response([
            'object' => 'list',
            'hasMore' => false,
            'totalCount' => 1,
            'limit' => 10,
            'offset' => 0,
            'data' => [[
                'id' => 'trf_ext_123',
                'status' => 'DONE',
                'type' => 'PIX',
                'value' => 90.0,
            ]],
        ], 200),
    ]);

    $query = ListTransferRequestDTO::fromArray([
        'dateCreated__ge' => '2026-02-01',
        'dateCreated__le' => '2026-02-27',
        'transferDate__ge' => null,
        'transferDate__le' => null,
        'type' => 'PIX',
    ]);

    $response = Asaas::transfer()->listTransfers($query);

    expect($response->totalCount)->toBe(1)
        ->and($response->data)->toBeArray();
});

test('it throws asaas request exception when transfer api fails', function () {
    Http::fake([
        'https://sandbox.asaas.com/api/v3/transfers' => Http::response([
            'errors' => [
                ['code' => 'insufficient_balance', 'description' => 'Saldo insuficiente.'],
            ],
        ], 400),
    ]);

    $dto = TransferAsaasAccountRequestDTO::fromArray([
        'value' => 99999.0,
        'walletId' => 'wal_123',
    ]);

    expect(fn () => Asaas::transfer()->transferAsaasAccount($dto))
        ->toThrow(AsaasRequestException::class, 'Saldo insuficiente.');
});
