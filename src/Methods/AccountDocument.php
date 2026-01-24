<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Bases\BaseMethods;

class AccountDocument extends BaseMethods
{

    public function checkPendingDocuments()
    {
        return $this->makeRequest('get', "/myAccount/documents");
    }

    public function sendDocuments(string $id, $multipartData)
    {
        return $this->makeRequest('post', "/myAccount/documents/{$id}", $multipartData);
    }

}
