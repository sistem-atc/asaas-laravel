<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Response\Payment\QrCodeResponseDTO;
use SistemAtc\Asaas\DTO\Response\Payment\PaymentResponseDTO;
use SistemAtc\Asaas\DTO\Request\Payment\ListPaymentRequestDTO;
use SistemAtc\Asaas\DTO\Request\Payment\CreatePaymentRequestDTO;
use SistemAtc\Asaas\DTO\Response\Payment\ListPaymentResponseDTO;
use SistemAtc\Asaas\DTO\Request\Payment\CreditCardPaymentRequestDTO;
use SistemAtc\Asaas\DTO\Request\Payment\PayChargeWithCreditCardRequestDTO;
use SistemAtc\Asaas\DTO\Response\Payment\PaymentBilingInformationResponseDTO;

class Payment extends BaseMethods
{

    public function createNewPayment(CreatePaymentRequestDTO $data): PaymentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST,'/payments',$data->toArray());
        return PaymentResponseDTO::fromArray($response);
    }

    public function listPayments(ListPaymentRequestDTO $queryParams): ListPaymentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/payments', $queryParams->toArray());
        return ListPaymentResponseDTO::fromarray($response);
    }

    public function createNewPaymentWithCreditCard(CreditCardPaymentRequestDTO $data): PaymentResponseDTO 
    {
        $response = $this->makeRequest(HttpMethod::POST,'/payments',$data->toArray());
        return PaymentResponseDTO::fromArray($response);
    }

    public function CapturePaymentWithPreAuthorization(string $id): PaymentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/payments/{$id}/captureAuthorizedPayment");
        return PaymentResponseDTO::fromArray($response);
    }

    public function payChargeWithCreditCard(string $id, PayChargeWithCreditCardRequestDTO $data): PaymentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/payments/{$id}/payWithCreditCard", $data->toArray());
        return PaymentResponseDTO::fromArray($response);
    }

    public function retrievePaymentBillingInformation(string $id): PaymentBilingInformationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/payments/{$id}/billingInfo");
        return PaymentBilingInformationResponseDTO::fromarray($response);
    }

    public function paymentViewingInformation(){}

    public function retrieveSinglePayment(){}

    public function updateExistingPayment(){}

    public function deletePayment(){}

    public function restoreRemovedPayment(){}

    public function retrieveStatusPayment(){}

    public function refundPayment(){}

    public function getDigitableBillLine(){}

    public function getQRCodeForPixPayments(string $id): QrCodeResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/payments/{$id}/pixQrCode",);
        return QrCodeResponseDTO::fromArray($response);
    }

    public function confirmCashReceipt(){}

    public function undoCashReceipt(){}

    public function salesSimulator(){}

    public function recoveryPaymentLimit(){}

}
