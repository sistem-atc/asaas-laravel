<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;

class CreditCard extends BaseMethods
{
    public function tokenization(array $data): ?array
    {
        return $this->makeRequest(HttpMethod::POST, '/creditCard/tokenization', $data);
    }
}
