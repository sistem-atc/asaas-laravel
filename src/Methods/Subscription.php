<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Response\Installment\FileResponseDTO;
use SistemAtc\Asaas\DTO\Response\Subscription\SubscriptionResponseDTO;
use SistemAtc\Asaas\DTO\Request\Subscription\ListSubscriptionRequestDTO;
use SistemAtc\Asaas\DTO\Request\Subscription\CreateSubscriptionRequestDTO;
use SistemAtc\Asaas\DTO\Request\Subscription\UpdateSubscriptionRequestDTO;
use SistemAtc\Asaas\DTO\Response\Subscription\ListSubscriptionResponseDTO;
use SistemAtc\Asaas\DTO\Response\Subscription\DeleteSubscriptionResponseDTO;
use SistemAtc\Asaas\DTO\Request\Subscription\ConfigurationInvoicesRequestDTO;
use SistemAtc\Asaas\DTO\Response\Subscription\DeleteConfigurationResponseDTO;
use SistemAtc\Asaas\DTO\Request\Subscription\ListInvoiceSubscriptionRequestDTO;
use SistemAtc\Asaas\DTO\Response\Subscription\ConfigurationInvoicesResponseDTO;
use SistemAtc\Asaas\DTO\Request\Subscription\ListPaymentSubscriptionRequestDTO;
use SistemAtc\Asaas\DTO\Response\Subscription\SubscriptionCreditCardResponseDTO;
use SistemAtc\Asaas\DTO\Response\Subscription\ListPaymentSubscriptionResponseDTO;
use SistemAtc\Asaas\DTO\Request\Subscription\BookletPaymentSubscriptionRequestDTO;
use SistemAtc\Asaas\DTO\Request\Subscription\UpdateConfigurationInvoicesRequestDTO;
use SistemAtc\Asaas\DTO\Request\Subscription\CreateSubscriptionCreditCardRequestDTO;
use SistemAtc\Asaas\DTO\Request\Subscription\UpdateSubscriptionCreditCardRequestDTO;
use SistemAtc\Asaas\DTO\Response\Subscription\ListInvoicesForSubscriptionResponseDTO;

class Subscription extends BaseMethods
{
    public function createNewSubscription(CreateSubscriptionRequestDTO $data): SubscriptionResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, '/subscriptions', $data);
        return SubscriptionResponseDTO::fromArray($response);
    }

    public function list(ListSubscriptionRequestDTO $data): ListSubscriptionResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/subscriptions', $data);
        return ListSubscriptionResponseDTO::fromArray($response);
    }

    public function createSubscriptionWithCreditCard(CreateSubscriptionCreditCardRequestDTO $data): SubscriptionCreditCardResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, '/subscriptions', $data);
        return SubscriptionCreditCardResponseDTO::fromArray($response);

    }
    
    public function retrieveSingleSubscription(string $id): SubscriptionResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/subscriptions/{$id}");
        return SubscriptionResponseDTO::fromArray($response);
    }
    
    public function update(string $id, UpdateSubscriptionRequestDTO $data): SubscriptionResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::PUT, "/subscriptions/{$id}", $data);
        return SubscriptionResponseDTO::fromArray($response);
    }

    public function remove(string $id): DeleteSubscriptionResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::DELETE, "/subscriptions/{$id}");
        return DeleteSubscriptionResponseDTO::fromArray($response);
    }

    public function updateCreditCard(string $id, UpdateSubscriptionCreditCardRequestDTO $data): SubscriptionResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::PUT, "/subscriptions/{$id}/creditCard", $data);
        return SubscriptionResponseDTO::fromArray($response);
    }
    
    public function listPaymentsSubscription(string $id, ListPaymentSubscriptionRequestDTO $data): ListPaymentSubscriptionResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/subscriptions/{$id}/payments", $data);
        return ListPaymentSubscriptionResponseDTO::fromArray($response);
    }
    
    public function generateSubscriptionBooklet(string $id, BookletPaymentSubscriptionRequestDTO $data): FileResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/subscriptions/{$id}/paymentBook", $data, true);
        return new FileResponseDTO($response);
    }
    
    public function createConfigurationForIssuingInvoices(string $id, ConfigurationInvoicesRequestDTO $data): ConfigurationInvoicesResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/subscriptions/{$id}/invoiceSettings", $data);
        return ConfigurationInvoicesResponseDTO::fromArray($response);
    }
    
    public function retrieveConfigurationForIssuingInvoices(string $id): ConfigurationInvoicesResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/subscriptions/{$id}/invoiceSettings");
        return ConfigurationInvoicesResponseDTO::fromArray($response);
    }
    
    public function removeConfigurationForIssuingInvoices(string $id): DeleteConfigurationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::DELETE, "/subscriptions/{$id}/invoiceSettings");
        return DeleteConfigurationResponseDTO::fromArray($response);
    }
    
    public function updateConfigurationForIssuingInvoices(string $id, UpdateConfigurationInvoicesRequestDTO $data): ConfigurationInvoicesResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::PUT, "/subscriptions/{$id}/invoiceSettings", $data);
        return ConfigurationInvoicesResponseDTO::fromArray($response);
    }
    
    public function listInvoicesForSubscriptionCharges(string $id, ListInvoiceSubscriptionRequestDTO $data): ListInvoicesForSubscriptionResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::PUT, "/subscriptions/{$id}/invoices", $data);
        return ListInvoicesForSubscriptionResponseDTO::fromArray($response);
    }
}