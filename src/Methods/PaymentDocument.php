<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\DTO\Request\PaymentDocument\UpdateSettingsDocumentRequestDTO;
use SistemAtc\Asaas\DTO\Response\PaymentDocument\DeletePaymentDocumentResponseDTO;
use SistemAtc\Asaas\DTO\Response\PaymentDocument\ListPaymentDocumentResponseDTO;
use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Response\PaymentDocument\PaymentDocumentResponseDTO;
use SistemAtc\Asaas\DTO\Request\PaymentDocument\UploadPaymentDocumentRequestDTO;

class PaymentDocument extends BaseMethods
{
    public function uploadPaymentDocuments(string $id, UploadPaymentDocumentRequestDTO $multipartData): PaymentDocumentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/payments/{$id}/documents", $multipartData->toMultipart());
        return PaymentDocumentResponseDTO::fromArray($response);
    }
    
    public function listDocumentsaPayment(string $id): ListPaymentDocumentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/payments/{$id}/documents");
        return ListPaymentDocumentResponseDTO::fromArray($response);
    }
    
    public function updateSettingsaDocumentPayment(string $id, string $documentId, UpdateSettingsDocumentRequestDTO $data): PaymentDocumentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::PUT, "/payments/{$id}/documents/{$documentId}", $data->toArray());
        return PaymentDocumentResponseDTO::fromArray($response);
    }
    
    public function retrieveSingleDocumentPayment(string $id, string $documentId): PaymentDocumentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/payments/{$id}/documents/{$documentId}");
        return PaymentDocumentResponseDTO::fromArray($response);
    }
    
    public function deleteDocumentFromPayment(string $id, string $documentId): DeletePaymentDocumentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::DELETE, "/payments/{$id}/documents/{$documentId}");
        return DeletePaymentDocumentResponseDTO::fromArray($response);
    }
    
}
