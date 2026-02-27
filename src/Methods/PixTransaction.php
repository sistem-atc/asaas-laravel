<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\PixTransaction\PayQrCodeRequestDTO;
use SistemAtc\Asaas\DTO\Response\PixTransaction\PayQrCodeResponseDTO;
use SistemAtc\Asaas\DTO\Request\PixTransaction\DecodeQrCodeRequestDTO;
use SistemAtc\Asaas\DTO\Response\PixTransaction\DecodeQrCodeResponseDTO;
use SistemAtc\Asaas\DTO\Request\PixTransaction\ListTransactionsRequestDTO;
use SistemAtc\Asaas\DTO\Response\PixTransaction\ListTransactionResponseDTO;

class PixTransaction extends BaseMethods
{
    public function payQRCode(PayQrCodeRequestDTO $data): PayQrCodeResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, '/pix/qrCodes/pay', $data->toArray());
        return PayQrCodeResponseDTO::fromArray($response);
    }
    
    public function decodeQRCodePayment(DecodeQrCodeRequestDTO $data): DecodeQrCodeResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, '/pix/qrCodes/decode', $data->toArray());
        return DecodeQrCodeResponseDTO::fromArray($response);
    }
    
    public function retrieveSingleTransaction(string $id): PayQrCodeResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/pix/transactions/{$id}");
        return PayQrCodeResponseDTO::fromArray($response);
    }
    
    public function listTransactions(ListTransactionsRequestDTO $queryParams): ListTransactionResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/pix/transactions', $queryParams->toArray());
        return ListTransactionResponseDTO::fromArray($response);
    }
    
    public function cancelScheduledTransaction(string $id): PayQrCodeResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/pix/transactions/{$id}/cancel");
        return PayQrCodeResponseDTO::fromArray($response);
    }
}