<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\Bill\CreateQRCodeStaticDTO;
use SistemAtc\Asaas\DTO\Response\Payment\QRCodeStaticDTO;

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
    
    public function createQrCodeStatic(CreateQRCodeStaticDTO $data): ?QRCodeStaticDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, '/pix/qrCodes/static', $data->toArray());
        return QRCodeStaticDTO::fromArray($response);
    }

    public function removeStaticQRCode()
    {

    }
    
    public function availableTokenBucketCheck()
    {

    }
    
}
