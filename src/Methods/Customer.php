<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\Customer\AsaasCustomer;
use SistemAtc\Asaas\DTO\Request\Customer\ListCustomer;
use SistemAtc\Asaas\DTO\Response\Customer\CustomerCreateDTO;
use SistemAtc\Asaas\Enum\HttpMethod;

class Customer extends BaseMethods
{

    public function create(AsaasCustomer $customer): ?CustomerCreateDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, '/customers', $customer->toArray());
        return CustomerCreateDTO::fromArray($response);
    }

    public function list(ListCustomer $queryParams): ?array
    {
        return $this->makeRequest(HttpMethod::GET, "/customers?" . http_build_query($queryParams->toArray()));
    }

    public function single_customer(AsaasCustomer $customer): ?array
    {
        return $this->makeRequest(HttpMethod::POST, "/customers/{$customer->asaas_id}");
    }

    public function update(AsaasCustomer $customer): ?array
    {
        return $this->makeRequest(HttpMethod::PUT, "/customers/{$customer->asaas_id}", $customer->toArray());
    }

    public function remove(string $id): ?array
    {
        return $this->makeRequest(HttpMethod::DELETE, "/customers/{$id}");
    }

    public function restore(string $id): ?array
    {
        return $this->makeRequest(HttpMethod::POST, "/customers/{$id}/restore");
    }

    public function notifications(string $id): ?array
    {
        return $this->makeRequest(HttpMethod::GET, "/customers/{$id}/notifications");
    }

}
