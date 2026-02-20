<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Response\AutomaticPix\SinglePaymentResponseDTO;
use SistemAtc\Asaas\DTO\Request\AutomaticPix\ListAuthorizationRequestDTO;
use SistemAtc\Asaas\DTO\Request\AutomaticPix\CreateAuthorizationRequestDTO;
use SistemAtc\Asaas\DTO\Response\AutomaticPix\ListAuthorizationResponseDTO;
use SistemAtc\Asaas\DTO\Response\AutomaticPix\CreateAuthorizationResponseDTO;
use SistemAtc\Asaas\DTO\Request\AutomaticPix\ListAuthorizationPaymentsRequestDTO;
use SistemAtc\Asaas\DTO\Response\AutomaticPix\ListAuthorizationPaymentResponseDTO;

class AutomaticPix extends BaseMethods
{

    public function createAuthorization(CreateAuthorizationRequestDTO $data): ?CreateAuthorizationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/pix/automatic/authorizations", $data->toArray());
        return CreateAuthorizationResponseDTO::fromArray($response);
    }

    public function listAuthorization(ListAuthorizationRequestDTO $queryParams): ?ListAuthorizationResponseDTO
    {
        $query = $queryParams ? '?' . http_build_query($queryParams->toArray()) : '';
        $endpoint = '/pix/automatic/authorizations' . $query;
        $response = $this->makeRequest(HttpMethod::GET, $endpoint);
        return ListAuthorizationResponseDTO::fromArray($response);
    }

    public function retrieveSingleAuthorization(string $id): ?CreateAuthorizationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/pix/automatic/authorizations/{$id}");
        return CreateAuthorizationResponseDTO::fromArray($response);
    }

    public function cancelAuthorization(string $id): ?CreateAuthorizationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::DELETE, "/pix/automatic/authorizations/{$id}");
        return CreateAuthorizationResponseDTO::fromArray($response);
    }

    public function retrieveSinglePaymentInstruction(string $id): ?SinglePaymentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/pix/automatic/paymentInstructions/{$id}");
        return SinglePaymentResponseDTO::fromArray($response);
    }

    public function listPaymentInstruction(ListAuthorizationPaymentsRequestDTO $queryParams): ?ListAuthorizationPaymentResponseDTO
    {
        $query = $queryParams ? '?' . http_build_query($queryParams->toArray()) : '';
        $endpoint = '/pix/automatic/paymentInstructions' . $query;
        $response = $this->makeRequest(HttpMethod::GET, $endpoint);
        return ListAuthorizationPaymentResponseDTO::fromArray($response);
    }
}
