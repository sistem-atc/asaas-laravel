<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\Payment\CreatePaymentRequestDTO;
use SistemAtc\Asaas\DTO\Response\PaymentWithSummaryData\PaymentWithSummaryResponseDTO;

class PaymentWithSummaryData extends BaseMethods
{
    public function createNewPaymentWithSummaryDataResponse(CreatePaymentRequestDTO $data): PaymentWithSummaryResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/lean/payments", $data->toArray());
        return PaymentWithSummaryResponseDTO::fromArray($response);
    }
    
    public function listPaymentsWithSummaryData()
    {

    }
    
    public function createNewPaymentWithCreditCardWithSummaryDataInResponse()
    {

    }
    
    public function capturePaymentWithPreAuthorizationWithSummaryDataInResponse()
    {

    }
    
    public function retrieveSinglePaymentWithSummaryData()
    {

    }
    
    public function updateExistingPaymentWithSummaryDataInResponse()
    {

    }
    
    public function deletePaymentWithSummaryData()
    {

    }
    
    public function restoreRemovedPaymentWithSummaryDataInResponse()
    {

    }
    
    public function refundPaymentWithSummaryDataInResponse()
    {

    }
    
    public function confirmCashReceiptWithSummaryDataInResponse()
    {

    }
    
    public function undoCashReceiptConfirmationWithSummaryDataInResponse()
    {

    }
    
}
