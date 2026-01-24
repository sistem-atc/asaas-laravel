<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Bases\BaseMethods;

class CreditCard extends BaseMethods
{
    public function tokenization(array $data): ?array
    {
        return $this->makeRequest('post', '/creditCard/tokenization', $data);
    }
}
