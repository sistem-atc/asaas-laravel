<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\Chargeback\CreditCardTokenizationDTO;
use SistemAtc\Asaas\DTO\Shared\Common\CreditCard as CommonCreditCard;

class CreditCard extends BaseMethods
{
    public function tokenization(CreditCardTokenizationDTO $data): ?CommonCreditCard
    {
        $response = $this->makeRequest(HttpMethod::POST, '/creditCard/tokenization', $data->toArray());
        return CommonCreditCard::fromArray($response);
    }
}
