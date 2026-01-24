<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\PaymentDTO;
use SistemAtc\Asaas\DTO\Shared\Request\ListPayment;
use SistemAtc\Asaas\DTO\Response\Payment\PaymentDTO as PaymentoDTOResponse;

class Payment extends BaseMethods
{

    public function create(PaymentDTO $data): ?PaymentoDTOResponse
    {
        $response = $this->makeRequest('post','/payments',$data->toArray());
        return PaymentoDTOResponse::fromArray($response);
    }

    public function list(ListPayment $filter): ?array
    {
        $query = $filter ? http_build_query($filter->toArray()) : [];
        return $this->makeRequest('get', '/payments', $query);
    }

    public function capturePreAuthorization(string $id): ?PaymentoDTOResponse
    {
        $response = $this->makeRequest('post', "/payments/{$id}/captureAuthorizedPayment", [$id]);
        return PaymentoDTOResponse::fromArray($response);
    }

    public function payChargeWithCreditCard(){}
    public function billingInfo(){}
    public function viewingInfo(){}
    public function retrySingle(){}
    public function update(){}
    public function delete(){}
    public function restore(){}
    public function status(){}
    public function refund(){}
    public function getDigitableBill(){}
    public function confirmCashReceipt(){}
    public function undoCashReceipt(){}
    public function salesSimulator(){}
    public function recoveryPaymentLimit(){}
}
