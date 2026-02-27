<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\Customer\CustomerRequestDTO;
use SistemAtc\Asaas\DTO\Request\Customer\ListCustomerRequestDTO;
use SistemAtc\Asaas\DTO\Response\Customer\ListCustomerResponseDTO;
use SistemAtc\Asaas\DTO\Response\Customer\CustomerCreateResponseDTO;
use SistemAtc\Asaas\DTO\Response\Customer\RemoveCustomerResponseDTO;
use SistemAtc\Asaas\DTO\Response\Customer\RetrieveNotificationCustomerResponseDTO;

class Customer extends BaseMethods
{

    public function createNewCustomer(CustomerRequestDTO $customer): CustomerCreateResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, '/customers', $customer->toArray());
        return CustomerCreateResponseDTO::fromArray($response);
    }

    public function listCustomers(ListCustomerRequestDTO $queryParams): ListCustomerResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/customers', $queryParams->toArray());
        return ListCustomerResponseDTO::fromArray( $response);
    }

    public function retrieveSingleCustomer(string $id): CustomerCreateResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/customers/{$id}");
        return CustomerCreateResponseDTO::fromArray($response);
    }

    public function updateExistingCustomer(CustomerRequestDTO $customer): CustomerCreateResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::PUT, "/customers/{$customer->asaas_id}", $customer->toArray());
        return CustomerCreateResponseDTO::fromArray($response);
    }

    public function removeCustomer(string $id): RemoveCustomerResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::DELETE, "/customers/{$id}");
        return RemoveCustomerResponseDTO::fromArray($response);
    }

    public function restoreRemovedCustomer(string $id): CustomerCreateResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/customers/{$id}/restore");
        return CustomerCreateResponseDTO::fromArray($response);
    }

    public function retrieveNotificationsFromCustomer(string $id): RetrieveNotificationCustomerResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/customers/{$id}/notifications");
        return RetrieveNotificationCustomerResponseDTO::fromArray($response);
    }
}