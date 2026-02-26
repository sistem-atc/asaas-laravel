<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Response\Installment\FileResponseDTO;
use SistemAtc\Asaas\DTO\Response\Installment\InstallmentResponseDTO;
use SistemAtc\Asaas\DTO\Request\Installment\ListInstallmentRequestDTO;
use SistemAtc\Asaas\DTO\Request\Installment\RefundInstallmentRequestDTO;
use SistemAtc\Asaas\DTO\Request\Installment\CreateInstallmentRequestDTO;
use SistemAtc\Asaas\DTO\Response\Installment\ListInstallmentResponseDTO;
use SistemAtc\Asaas\DTO\Response\Installment\DeleteInstallmentResponseDTO;
use SistemAtc\Asaas\DTO\Request\Installment\UpdateSplitInstallmentRequestDTO;
use SistemAtc\Asaas\DTO\Request\Installment\ListPaymentInstallmentRequestDTO;
use SistemAtc\Asaas\DTO\Response\Installment\ListPaymentInstallmentResponseDTO;
use SistemAtc\Asaas\DTO\Response\Installment\UpdateInstallmentSplitsResponseDTO;
use SistemAtc\Asaas\DTO\Request\Installment\GenerateInstallmentBookletRequestDTO;
use SistemAtc\Asaas\DTO\Response\Installment\CancelChargesInstallmentResponseDTO;
use SistemAtc\Asaas\DTO\Request\Installment\CreateInstallmentWithCreditCardRequestDTO;

class Installment extends BaseMethods
{
    public function createInstallment(CreateInstallmentRequestDTO $data): InstallmentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/installments", $data->toArray());
        return InstallmentResponseDTO::fromArray(($response));
    }

    public function listInstallmentsCreateInstallmentWithCreditCard(ListInstallmentRequestDTO $queryParams): ListInstallmentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/installments', $queryParams->toArray());
        return ListInstallmentResponseDTO::fromArray($response);
    }

    public function createInstallmentWithCreditCard(CreateInstallmentWithCreditCardRequestDTO $data): InstallmentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/installments", $data->toArray());
        return InstallmentResponseDTO::fromArray(($response));
    }

    public function retrieveSingleInstallment(string $id): InstallmentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/installments/{$id}");
        return InstallmentResponseDTO::fromArray(($response));
    }

    public function removeInstallment(string $id): DeleteInstallmentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::DELETE, "/installments/{$id}");
        return DeleteInstallmentResponseDTO::fromArray($response);
    }

    public function listPaymentsInstallment(string $id, ListPaymentInstallmentRequestDTO $queryParams): ListPaymentInstallmentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/installments/{$id}/payments", $queryParams->toArray());
        return ListPaymentInstallmentResponseDTO::fromArray($response);
    }

    public function generateInstallmentBooklet(string $id, GenerateInstallmentBookletRequestDTO $queryParams): FileResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/installments/{$id}/payments",$queryParams->toArray(), true);
        return new FileResponseDTO($response);
    }

    public function refundInstallment(string $id, RefundInstallmentRequestDTO $data): InstallmentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/installments/{$id}/refund", $data->toArray());
        return InstallmentResponseDTO::fromArray(($response));
    }

    public function updateInstallmentSplits(string $id, UpdateSplitInstallmentRequestDTO $data): UpdateInstallmentSplitsResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::PUT, "/installments/{$id}/splits", $data->toArray());
        return UpdateInstallmentSplitsResponseDTO::fromArray(($response));
    }

    public function cancelChargesInstallment(string $id): CancelChargesInstallmentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::DELETE, "/installments/{$id}/payments");
        return CancelChargesInstallmentResponseDTO::fromArray($response);
    }
}