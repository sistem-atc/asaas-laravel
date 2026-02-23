<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Response\PaymentRefund\RefundBankSlipResponseDTO;
use SistemAtc\Asaas\DTO\Response\PaymentRefund\RetrieveSinglePaymentResponseDTO;

class PaymentRefund extends BaseMethods
{
    public function retrieveRefundsSinglePayment(string $id): RetrieveSinglePaymentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/payments/{$id}/refunds");
        return RetrieveSinglePaymentResponseDTO::fromArray($response);
    }
    
    public function refundBankSlip(string $id): RefundBankSlipResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/payments/{$id}/bankSlip/refund");
        return RefundBankSlipResponseDTO::fromArray($response);
    }
    
}
