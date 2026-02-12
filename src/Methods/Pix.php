<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;

class Pix extends BaseMethods
{
    public function createKey()
    {

    }
    
    public function listKeys()
    {

    }
    
    public function retrieveSingleKey()
    {

    }
    
    public function removeKey()
    {

    }
    
    public function createQrCodeStatic(array $data): ?array
    {
        return $this->makeRequest(HttpMethod::POST, '/pix/qrCodes/static', $data);
    }

    public function removeStaticQRCode()
    {

    }
    
    public function availableTokenBucketCheck()
    {

    }
    
}
