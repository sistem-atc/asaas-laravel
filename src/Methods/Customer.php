<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Factory\CustomerFactory;
use SistemAtc\Asaas\DTO\Shared\Request\ListCustomer;
use SistemAtc\Asaas\DTO\Shared\Request\AsaasCustomer;
use SistemAtc\Asaas\DTO\Response\Customer\CustomerCreateDTO;

class Customer extends BaseMethods
{

    public function create(AsaasCustomer $customer): ?CustomerCreateDTO
    {
        $response = $this->makeRequest('post', '/customers', $customer->toArray());
        if (!$response) return null;
        return CustomerFactory::makeCreateResponse($response);
    }

    public function list(ListCustomer $filter): ?array
    {
        $query = $filter ? '?' . http_build_query($filter->toArray()) : [];
        return $this->makeRequest('get', '/customers', $query);
    }

    public function single_customer(AsaasCustomer $customer): ?array
    {
        return $this->makeRequest('post', "/customers/{$customer->asaas_id}");
    }

    public function update(AsaasCustomer $customer): ?array
    {
        return $this->makeRequest('put', "/customers/{$customer->asaas_id}", $customer->toArray());
    }

    public function remove(AsaasCustomer $customer): ?array
    {
        return $this->makeRequest('delete', "/customers/{$customer->asaas_id}");
    }

    public function restore(AsaasCustomer $customer): ?array
    {
        return $this->makeRequest('post', "/customers/{$customer->asaas_id}/restore");
    }

    public function notifications(AsaasCustomer $customer): ?array
    {
        return $this->makeRequest('get', "/customers/{$customer->asaas_id}/notifications");
    }

}
