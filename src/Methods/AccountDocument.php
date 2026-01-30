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

    public function viewDocumentSent(string $id)
    {
        return $this->makeRequest('get', "/myAccount/documents/files/{$id}");
    }

    public function updateSentDocument(string $id, $documentFile)
    {
        return $this->makeRequest('post', "/myAccount/documents/files/{$id}", $documentFile);
    }

    public function removeSentDocument(string $id)
    {
        return $this->makeRequest('delete', "/myAccount/documents/files/{$id}");
    }
}
