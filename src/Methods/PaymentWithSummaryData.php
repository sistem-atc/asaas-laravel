<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\Payment\ConfirmCashRequestDTO;
use SistemAtc\Asaas\DTO\Request\Payment\ListPaymentRequestDTO;
use SistemAtc\Asaas\DTO\Request\Payment\RefundPaymentRequestDTO;
use SistemAtc\Asaas\DTO\Request\Payment\CreatePaymentRequestDTO;
use SistemAtc\Asaas\DTO\Request\Payment\CreditCardPaymentRequestDTO;
use SistemAtc\Asaas\DTO\Response\PaymentWithSummaryData\PaymentWithSummaryResponseDTO;
use SistemAtc\Asaas\DTO\Response\PaymentWithSummaryData\DeletePaymentSummaryResponseDTO;
use SistemAtc\Asaas\DTO\Response\PaymentWithSummaryData\ListPaymentWithSummaryResponseDTO;
use SistemAtc\Asaas\DTO\Response\PaymentWithSummaryData\PaymentWithSummaryCreditCardResponseDTO;

class PaymentWithSummaryData extends BaseMethods
{
    public function createNewPaymentWithSummaryDataResponse(CreatePaymentRequestDTO $data): PaymentWithSummaryResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/lean/payments", $data->toArray());
        return PaymentWithSummaryResponseDTO::fromArray($response);
    }
    
    public function listPaymentsWithSummaryData(ListPaymentRequestDTO $queryParams): ListPaymentWithSummaryResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/lean/payments", $queryParams->toArray());
        return ListPaymentWithSummaryResponseDTO::fromArray($response);
    }
    
    public function createNewPaymentWithCreditCardWithSummaryDataInResponse(CreditCardPaymentRequestDTO $data): PaymentWithSummaryCreditCardResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/lean/payments", $data->toArray());
        return PaymentWithSummaryCreditCardResponseDTO::fromArray($response);
    }
    
    public function capturePaymentWithPreAuthorizationWithSummaryDataInResponse(string $id): PaymentWithSummaryResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/lean/payments/{$id}/captureAuthorizedPayment");
        return PaymentWithSummaryResponseDTO::fromArray($response); 
    }
    
    public function retrieveSinglePaymentWithSummaryData(string $id): PaymentWithSummaryResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/lean/payments/{$id}");
        return PaymentWithSummaryResponseDTO::fromArray($response); 
    }
    
    public function updateExistingPaymentWithSummaryDataInResponse(string $id): PaymentWithSummaryResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::PUT, "/lean/payments/{$id}");
        return PaymentWithSummaryResponseDTO::fromArray($response); 
    }
    
    public function deletePaymentWithSummaryData(string $id): DeletePaymentSummaryResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::DELETE, "/lean/payments/{$id}");
        return DeletePaymentSummaryResponseDTO::fromArray($response);
    }
    
    public function restoreRemovedPaymentWithSummaryDataInResponse(string $id): PaymentWithSummaryResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/lean/payments/{$id}/restore");
        return PaymentWithSummaryResponseDTO::fromArray($response); 
    }
    
    public function refundPaymentWithSummaryDataInResponse(string $id, RefundPaymentRequestDTO $data): PaymentWithSummaryResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/lean/payments/{$id}/refund", $data->toArray());
        return PaymentWithSummaryResponseDTO::fromArray($response); 
    }
    
    public function confirmCashReceiptWithSummaryDataInResponse(string $id, ConfirmCashRequestDTO $data): PaymentWithSummaryResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/lean/payments/{$id}/receiveInCash", $data->toArray());
        return PaymentWithSummaryResponseDTO::fromArray($response); 
    }
    
    public function undoCashReceiptConfirmationWithSummaryDataInResponse(string $id): PaymentWithSummaryResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/lean/payments/{$id}/undoReceivedInCash");
        return PaymentWithSummaryResponseDTO::fromArray($response); 
    }
}