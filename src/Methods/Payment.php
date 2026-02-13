<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\Payment\ListPayment;
use SistemAtc\Asaas\DTO\Request\Payment\PaymentDTO;
use SistemAtc\Asaas\DTO\Response\Payment\QrCodeDTO;
use SistemAtc\Asaas\DTO\Response\Payment\ListPaymentDTO;
use SistemAtc\Asaas\DTO\Request\Payment\CreditCardPaymentDTO;
use SistemAtc\Asaas\DTO\Request\Payment\PayChargeWithCreditCardDTO;
use SistemAtc\Asaas\DTO\Response\Payment\PaymentDTO as PaymentoDTOResponse;

class Payment extends BaseMethods
{

    public function createNewPayment(PaymentDTO $data): ?PaymentoDTOResponse
    {
        $response = $this->makeRequest(HttpMethod::POST,'/payments',$data->toArray());
        return PaymentoDTOResponse::fromArray($response);
    }

    public function listPayments(ListPayment $queryParams): ?ListPaymentDTO
    {
        $query = $queryParams ? '?' . http_build_query($queryParams->toArray()) : '';
        $endpoint = '/payments' . $query;
        $response = $this->makeRequest(HttpMethod::GET, $endpoint);
        return ListPaymentDTO::fromarray($response);
    }

    public function createNewPaymentWithCreditCard(CreditCardPaymentDTO $data): PaymentoDTOResponse 
    {
        $response = $this->makeRequest(HttpMethod::POST,'/payments',$data->toArray());
        return PaymentoDTOResponse::fromArray($response);
    }

    public function CapturePaymentWithPreAuthorization(string $id): ?PaymentoDTOResponse
    {
        $response = $this->makeRequest(HttpMethod::POST, "/payments/{$id}/captureAuthorizedPayment");
        return PaymentoDTOResponse::fromArray($response);
    }

    public function payChargeWithCreditCard(string $id, PayChargeWithCreditCardDTO $data): PaymentoDTOResponse
    {
        $response = $this->makeRequest(HttpMethod::POST, "/payments/{$id}/payWithCreditCard", $data->toArray());
        return PaymentoDTOResponse::fromArray($response);
    }

    public function retrievePaymentBillingInformation(){}

    public function paymentViewingInformation(){}

    public function retrieveSinglePayment(){}

    public function updateExistingPayment(){}

    public function deletePayment(){}

    public function restoreRemovedPayment(){}

    public function retrieveStatusPayment(){}

    public function refundPayment(){}

    public function getDigitableBillLine(){}

    public function getQRCodeForPixPayments(string $paymentId): QrCodeDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/payments/{$paymentId}/pixQrCode",);
        return QrCodeDTO::fromArray($response);
    }

    public function confirmCashReceipt(){}

    public function undoCashReceipt(){}

    public function salesSimulator(){}

    public function recoveryPaymentLimit(){}

}
