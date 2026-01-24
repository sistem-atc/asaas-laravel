<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Bases\BaseMethods;

class Pix extends BaseMethods
{

    public function createQrCodeStatic(array $data): ?array
    {
        return $this->makeRequest('post', '/pix/qrCodes/static', $data);
    }

    public function recurrentPix(array $data)
    {
        // Not implemented yet
    }

}
