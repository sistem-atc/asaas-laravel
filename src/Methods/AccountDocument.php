<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\AccountDocument\SendDocumentDTO;
use SistemAtc\Asaas\DTO\Response\AccountDocument\SendDocumentsDTO;
use SistemAtc\Asaas\DTO\Response\AccountDocument\RemoveDocumentsDTO;
use SistemAtc\Asaas\DTO\Response\AccountDocument\CheckPendingDocumentsDTO;
use SistemAtc\Asaas\Enum\HttpMethod;

class AccountDocument extends BaseMethods
{

    public function checkPendingDocuments(): CheckPendingDocumentsDTO
    {
        $response =  $this->makeRequest(HttpMethod::GET, "/myAccount/documents");
        return CheckPendingDocumentsDTO::fromArray($response);
    }

    public function sendDocuments(string $id, SendDocumentDTO $multipartData): SendDocumentsDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/myAccount/documents/{$id}", $multipartData->toMultipart());
        return SendDocumentsDTO::fromArray($response);
    }

    public function viewDocumentSent(string $documentId): SendDocumentsDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/myAccount/documents/files/{$documentId}");
        return SendDocumentsDTO::fromArray($response);
    }

    public function updateSentDocument(string $documentId, SendDocumentDTO $multipartData): SendDocumentsDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/myAccount/documents/files/{$documentId}", $multipartData->toMultipart());
        return SendDocumentsDTO::fromArray($response);
    }

    public function removeSentDocument(string $documentId): RemoveDocumentsDTO
    {
        $response = $this->makeRequest(HttpMethod::DELETE, "/myAccount/documents/files/{$documentId}");
        return RemoveDocumentsDTO::fromArray($response);
    }
}
