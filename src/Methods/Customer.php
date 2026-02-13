<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\Customer\ListCustomer;
use SistemAtc\Asaas\DTO\Request\Customer\AsaasCustomer;
use SistemAtc\Asaas\DTO\Response\Customer\CustomerCreateDTO;

class Customer extends BaseMethods
{

    public function createNewCustomer(AsaasCustomer $customer): ?CustomerCreateDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, '/customers', $customer->toArray());
        return CustomerCreateDTO::fromArray($response);
    }

    public function listCustomers(ListCustomer $queryParams): ?array
    {
        $query = $queryParams ? '?' . http_build_query($queryParams->toArray()) : '';
        $endpoint = '/customers' . $query;
        $response = $this->makeRequest(HttpMethod::GET, $endpoint);
        return $response;
    }

    public function retrieveSingleCustomer(string $id): ?array
    {
        return $this->makeRequest(HttpMethod::GET, "/customers/{$id}");
    }

    public function updateExistingCustomer(AsaasCustomer $customer): ?array
    {
        return $this->makeRequest(HttpMethod::PUT, "/customers/{$customer->asaas_id}", $customer->toArray());
    }

    public function removeCustomer(string $id): ?array
    {
        return $this->makeRequest(HttpMethod::DELETE, "/customers/{$id}");
    }

    public function restoreRemovedCustomer(string $id): ?array
    {
        return $this->makeRequest(HttpMethod::POST, "/customers/{$id}/restore");
    }

    public function retrieveNotificationsFromCustomer(string $id): ?array
    {
        return $this->makeRequest(HttpMethod::GET, "/customers/{$id}/notifications");
    }

}
