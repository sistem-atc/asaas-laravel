<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;

class Subscription extends BaseMethods
{
    public function create(array $data): ?array
    {
        return $this->makeRequest(HttpMethod::POST, '/subscriptions', $data);
    }

    public function list(): array
    {
        return [];
    }

    public function update(): array
    {
        return [];
    }

    public function remove(): array
    {
        return [];
    }

    public function update_credit_card(): array
    {
        return [];
    }

}
