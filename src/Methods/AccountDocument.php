<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\AccountDocument\SendDocumentDTO;
use SistemAtc\Asaas\DTO\Response\AccountDocument\SendDocumentsDTO;
use SistemAtc\Asaas\DTO\Response\AccountDocument\RemoveDocumentsDTO;
use SistemAtc\Asaas\DTO\Response\AccountDocument\CheckPendingDocumentsDTO;

class AccountDocument extends BaseMethods
{

    public function checkPendingDocuments(): CheckPendingDocumentsDTO
    {
        $response =  $this->makeRequest('get', "/myAccount/documents");
        return CheckPendingDocumentsDTO::fromArray($response);
    }

    public function sendDocuments(string $id, SendDocumentDTO $multipartData): SendDocumentsDTO
    {
        $response = $this->makeRequest('post', "/myAccount/documents/{$id}", $multipartData->toMultipart());
        return SendDocumentsDTO::fromArray($response);
    }

    public function viewDocumentSent(string $documentId): SendDocumentsDTO
    {
        $response = $this->makeRequest('get', "/myAccount/documents/files/{$documentId}");
        return SendDocumentsDTO::fromArray($response);
    }

    public function updateSentDocument(string $documentId, SendDocumentDTO $multipartData): SendDocumentsDTO
    {
        $response = $this->makeRequest('post', "/myAccount/documents/files/{$documentId}", $multipartData->toMultipart());
        return SendDocumentsDTO::fromArray($response);
    }

    public function removeSentDocument(string $documentId): RemoveDocumentsDTO
    {
        $response = $this->makeRequest('delete', "/myAccount/documents/files/{$documentId}");
        return RemoveDocumentsDTO::fromArray($response);
    }
}
