<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Shared\Common\CreditCard as CommonCreditCard;
use SistemAtc\Asaas\DTO\Request\CreditCard\CreditCardTokenizationRequestDTO;

class CreditCard extends BaseMethods
{
    public function tokenization(CreditCardTokenizationRequestDTO $data): CommonCreditCard
    {
        $response = $this->makeRequest(HttpMethod::POST, '/creditCard/tokenization', $data->toArray());
        return CommonCreditCard::fromArray($response);
    }
}
