<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\Bill\CreateSubscriptionRequestDTO;

class Subscription extends BaseMethods
{
    public function createNewSubscription(CreateSubscriptionRequestDTO $data): ?array
    {
        $response = $this->makeRequest(HttpMethod::POST, '/subscriptions', $data->toArray());
        return $response;
    }

    public function list(): array
    {
        return [];
    }

    public function createSubscriptionWithCreditCard()
    {

    }
    
    public function retrieveSingleSubscription()
    {

    }
    
    public function update(): array
    {
        return [];
    }

    public function remove(): array
    {
        return [];
    }

    public function updateCreditCard(): array
    {
        return [];
    }
    
    public function listPaymentsSubscription()
    {

    }
    
    public function generateSubscriptionBooklet()
    {

    }
    
    public function createConfigurationForIssuingInvoices()
    {

    }
    
    public function retrieveConfigurationForIssuingInvoices()
    {

    }
    
    public function removeConfigurationForIssuingInvoices()
    {

    }
    
    public function updateConfigurationForIssuingInvoices()
    {

    }
    
    public function listInvoicesForSubscriptionCharges()
    {

    }
    
}
