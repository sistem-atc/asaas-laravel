<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Response\Checkout\CheckoutResponseDTO;
use SistemAtc\Asaas\DTO\Request\Checkout\CreateNewCheckoutRequestDTO;

class Checkout extends BaseMethods
{

    public function createCheckout(CreateNewCheckoutRequestDTO $data): CheckoutResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/checkouts", $data);
        return CheckoutResponseDTO::fromArray($response);
    }

    public function cancelCheckout(string $id): CheckoutResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/checkouts/{$id}/cancel");
        return CheckoutResponseDTO::fromArray($response);
    }
}