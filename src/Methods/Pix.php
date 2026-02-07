<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;

class Pix extends BaseMethods
{

    public function createQrCodeStatic(array $data): ?array
    {
        return $this->makeRequest(HttpMethod::POST, '/pix/qrCodes/static', $data);
    }

    public function recurrentPix(array $data)
    {
        // Not implemented yet
    }

}
