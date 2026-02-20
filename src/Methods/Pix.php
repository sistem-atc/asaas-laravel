<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Response\Payment\QRCodeStaticResponseDTO;
use SistemAtc\Asaas\DTO\Request\Bill\CreateQRCodeStaticRequestDTO;

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
    
    public function createQrCodeStatic(CreateQRCodeStaticRequestDTO $data): ?QRCodeStaticResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, '/pix/qrCodes/static', $data->toArray());
        return QRCodeStaticResponseDTO::fromArray($response);
    }

    public function removeStaticQRCode()
    {

    }
    
    public function availableTokenBucketCheck()
    {

    }
    
}
