<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\AccountDocument\SendDocumentRequestDTO;
use SistemAtc\Asaas\DTO\Response\AccountDocument\SendDocumentsResponseDTO;
use SistemAtc\Asaas\DTO\Response\AccountDocument\RemoveDocumentsResponseDTO;
use SistemAtc\Asaas\DTO\Response\AccountDocument\CheckPendingDocumentsResponseDTO;

class AccountDocument extends BaseMethods
{

    public function checkPendingDocuments(): ?CheckPendingDocumentsResponseDTO
    {
        $response =  $this->makeRequest(HttpMethod::GET, "/myAccount/documents");
        return CheckPendingDocumentsResponseDTO::fromArray($response);
    }

    public function sendDocuments(string $id, SendDocumentRequestDTO $multipartData): ?SendDocumentsResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/myAccount/documents/{$id}", $multipartData->toMultipart());
        return SendDocumentsResponseDTO::fromArray($response);
    }

    public function viewDocumentSent(string $documentId): ?SendDocumentsResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/myAccount/documents/files/{$documentId}");
        return SendDocumentsResponseDTO::fromArray($response);
    }

    public function updateSentDocument(string $documentId, SendDocumentRequestDTO $multipartData): ?SendDocumentsResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/myAccount/documents/files/{$documentId}", $multipartData->toMultipart());
        return SendDocumentsResponseDTO::fromArray($response);
    }

    public function removeSentDocument(string $documentId): ?RemoveDocumentsResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::DELETE, "/myAccount/documents/files/{$documentId}");
        return RemoveDocumentsResponseDTO::fromArray($response);
    }
}
