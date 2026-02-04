<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\SendDocumentDTO;
use SistemAtc\Asaas\DTO\Response\AccountDocument\CheckPendingDocumentsDTO;

class AccountDocument extends BaseMethods
{

    public function checkPendingDocuments()
    {
        $response =  $this->makeRequest('get', "/myAccount/documents");
        return CheckPendingDocumentsDTO::fromArray($response);
    }

    public function sendDocuments(string $id, SendDocumentDTO $multipartData)
    {
        return $this->makeRequest('post', "/myAccount/documents/{$id}", $multipartData->toMultipart());
    }

    public function viewDocumentSent(string $documentId)
    {
        return $this->makeRequest('get', "/myAccount/documents/files/{$documentId}");
    }

    public function updateSentDocument(string $documentId, $documentFile)
    {
        return $this->makeRequest('post', "/myAccount/documents/files/{$documentId}", $documentFile);
    }

    public function removeSentDocument(string $documentId)
    {
        return $this->makeRequest('delete', "/myAccount/documents/files/{$documentId}");
    }
}
