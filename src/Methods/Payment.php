<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Response\Payment\QrCodeResponseDTO;
use SistemAtc\Asaas\DTO\Response\Payment\PaymentResponseDTO;
use SistemAtc\Asaas\DTO\Request\Payment\ListPaymentRequestDTO;
use SistemAtc\Asaas\DTO\Request\Payment\ConfirmCashRequestDTO;
use SistemAtc\Asaas\DTO\Request\Payment\CreatePaymentRequestDTO;
use SistemAtc\Asaas\DTO\Request\Payment\RefundPaymentRequestDTO;
use SistemAtc\Asaas\DTO\Request\Payment\UpdatePaymentRequestDTO;
use SistemAtc\Asaas\DTO\Response\Payment\ListPaymentResponseDTO;
use SistemAtc\Asaas\DTO\Request\Payment\SalesSimulatorRequestsDTO;
use SistemAtc\Asaas\DTO\Response\Payment\DeletePaymentResponseDTO;
use SistemAtc\Asaas\DTO\Response\Payment\StatusPaymentResponseDTO;
use SistemAtc\Asaas\DTO\Response\Payment\SalesSimulatorResponseDTO;
use SistemAtc\Asaas\DTO\Response\Payment\ViewInformationResponseDTO;
use SistemAtc\Asaas\DTO\Request\Payment\CreditCardPaymentRequestDTO;
use SistemAtc\Asaas\DTO\Response\Payment\DigitableBillLineResponseDTO;
use SistemAtc\Asaas\DTO\Response\Payment\RecoveryLimitPaymentResponseDTO;
use SistemAtc\Asaas\DTO\Request\Payment\PayChargeWithCreditCardRequestDTO;
use SistemAtc\Asaas\DTO\Response\Payment\PaymentBilingInformationResponseDTO;

class Payment extends BaseMethods
{

    public function createNewPayment(CreatePaymentRequestDTO $data): PaymentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST,'/payments',$data);
        return PaymentResponseDTO::fromArray($response);
    }

    public function listPayments(ListPaymentRequestDTO $data): ListPaymentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/payments', $data);
        return ListPaymentResponseDTO::fromarray($response);
    }

    public function createNewPaymentWithCreditCard(CreditCardPaymentRequestDTO $data): PaymentResponseDTO 
    {
        $response = $this->makeRequest(HttpMethod::POST,'/payments',$data);
        return PaymentResponseDTO::fromArray($response);
    }

    public function CapturePaymentWithPreAuthorization(string $id): PaymentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/payments/{$id}/captureAuthorizedPayment");
        return PaymentResponseDTO::fromArray($response);
    }

    public function payChargeWithCreditCard(string $id, PayChargeWithCreditCardRequestDTO $data): PaymentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/payments/{$id}/payWithCreditCard", $data);
        return PaymentResponseDTO::fromArray($response);
    }

    public function retrievePaymentBillingInformation(string $id): PaymentBilingInformationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/payments/{$id}/billingInfo");
        return PaymentBilingInformationResponseDTO::fromarray($response);
    }

    public function paymentViewingInformation(string $id): ViewInformationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/payments/{$id}/viewingInfo");
        return ViewInformationResponseDTO::fromArray($response);
    }

    public function retrieveSinglePayment(string $id): PaymentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/payments/{$id}");
        return PaymentResponseDTO::fromArray($response);
    }

    public function updateExistingPayment(string $id, UpdatePaymentRequestDTO $data): PaymentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::PUT, "/payments/{$id}", $data);
        return PaymentResponseDTO::fromArray($response);
    }

    public function deletePayment(string $id): DeletePaymentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::DELETE, "/payments/{$id}");
        return DeletePaymentResponseDTO::fromArray($response);
    }

    public function restoreRemovedPayment(string $id): PaymentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/payments/{$id}/restore");
        return PaymentResponseDTO::fromArray($response);
    }

    public function retrieveStatusPayment(string $id): StatusPaymentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/payments/{$id}/status");
        return StatusPaymentResponseDTO::fromArray($response);
    }

    public function refundPayment(string $id, RefundPaymentRequestDTO $data): PaymentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/payments/{$id}/refund", $data);
        return PaymentResponseDTO::fromArray($response);
    }

    public function getDigitableBillLine(string $id): DigitableBillLineResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/payments/{$id}/identificationField");
        return DigitableBillLineResponseDTO::fromArray($response);
    }

    public function getQRCodeForPixPayments(string $id): QrCodeResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/payments/{$id}/pixQrCode");
        return QrCodeResponseDTO::fromArray($response);
    }

    public function confirmCashReceipt(string $id, ConfirmCashRequestDTO $data): PaymentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/payments/{$id}/receiveInCash", $data);
        return PaymentResponseDTO::fromArray($response);
    }

    public function undoCashReceipt(string $id): PaymentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/payments/{$id}/undoReceivedInCash");
        return PaymentResponseDTO::fromArray($response);
    }

    public function salesSimulator(SalesSimulatorRequestsDTO $data): SalesSimulatorResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/payments/simulate", $data);
        return SalesSimulatorResponseDTO::fromArray($response);
    }

    public function recoveryPaymentLimit(): RecoveryLimitPaymentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/payments/limits");
        return RecoveryLimitPaymentResponseDTO::fromArray($response);
    }
}