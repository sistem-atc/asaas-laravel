<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\PaymentDunning\ListsDunningRequestDTO;
use SistemAtc\Asaas\DTO\Response\PaymentDunning\HistoryListResponseDTO;
use SistemAtc\Asaas\DTO\Request\PaymentDunning\ResendDocumentRequestDTO;
use SistemAtc\Asaas\DTO\Request\PaymentDunning\PaymentDunningRequestDTO;
use SistemAtc\Asaas\DTO\Response\PaymentDunning\PaymentDunningResponseDTO;
use SistemAtc\Asaas\DTO\Request\PaymentDunning\ListPaymentDunningRequestDTO;
use SistemAtc\Asaas\DTO\Response\PaymentDunning\ListPaymentDunningResponseDTO;
use SistemAtc\Asaas\DTO\Response\PaymentDunning\ListPaymentReceivedResponseDTO;
use SistemAtc\Asaas\DTO\Request\PaymentDunning\SimulatePaymentDunningRequestDTO;
use SistemAtc\Asaas\DTO\Response\PaymentDunning\ListPaymentsAvaliableResponseDTO;
use SistemAtc\Asaas\DTO\Response\PaymentDunning\SimulatePaymentDunningResponseDTO;

class PaymentDunning extends BaseMethods
{
    public function createPaymentDunning(PaymentDunningRequestDTO $data): PaymentDunningResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/paymentDunnings", $data);
        return PaymentDunningResponseDTO::fromArray($response);
    }
    
    public function listPaymentDunnings(ListPaymentDunningRequestDTO $data): ListPaymentDunningResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/paymentDunnings', $data);
        return ListPaymentDunningResponseDTO::fromArray($response);
    }
    
    public function simulatePaymentDunning(SimulatePaymentDunningRequestDTO $data): SimulatePaymentDunningResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, '/paymentDunnings', $data);
        return SimulatePaymentDunningResponseDTO::fromArray($response);
    }
    
    public function recoverSinglePaymentDunning(string $id): PaymentDunningResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/paymentDunnings/{$id}');
        return PaymentDunningResponseDTO::fromArray($response);
    }
    
    public function eventHistoryLists(string $id, ListsDunningRequestDTO $data): HistoryListResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/paymentDunnings/{$id}/history", $data);
        return HistoryListResponseDTO::fromArray($response);
    }
    
    public function listPaymentsReceived(string $id, ListsDunningRequestDTO $data): ListPaymentReceivedResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/paymentDunnings/{$id}/partialPayments", $data);
        return ListPaymentReceivedResponseDTO::fromArray($response);
    }
    
    public function listPaymentsAvailablePaymentDunning(ListsDunningRequestDTO $data): ListPaymentsAvaliableResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/paymentDunnings/paymentsAvailableForDunning", $data);
        return ListPaymentsAvaliableResponseDTO::fromArray($response);
    }
    
    public function resendDocuments(string $id, ResendDocumentRequestDTO $data): PaymentDunningResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/paymentDunnings/{$id}/documents", $data);
        return PaymentDunningResponseDTO::fromArray($response);
    }
    
    public function cancelPaymentDunning(string $id): PaymentDunningResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/paymentDunnings/{$id}/cancel");
        return PaymentDunningResponseDTO::fromArray($response);
    }   
}