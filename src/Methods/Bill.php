<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Response\Bill\BillResponseDTO;
use SistemAtc\Asaas\DTO\Response\Bill\ListBillResponseDTO;
use SistemAtc\Asaas\DTO\Request\Bill\CreateBillRequestDTO;
use SistemAtc\Asaas\DTO\Request\Bill\SimulateBillPaymentRequestDTO;
use SistemAtc\Asaas\DTO\Response\Bill\SimulateBillPaymentResponseDTO;
use SistemAtc\Asaas\DTO\Request\Bill\ListBillPaymentsFilterRequestDTO;

class Bill extends BaseMethods
{

    public function createBill(CreateBillRequestDTO $data): BillResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, '/bill', $data->toArray());
        return BillResponseDTO::fromArray($response);
    }

    public function listBill(ListBillPaymentsFilterRequestDTO $queryParams): ListBillResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/bill', $queryParams->toArray());
        return ListBillResponseDTO::fromArray($response);
    }

    public function simulateBillPayment(SimulateBillPaymentRequestDTO $data): SimulateBillPaymentResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/bill/simulate", $data->toArray());
        return SimulateBillPaymentResponseDTO::fromArray($response);
    }

    public function retrieveSingleBill(string $id): BillResponseDTO
    {
        $response =  $this->makeRequest(HttpMethod::GET, "/bill/{$id}");
        return BillResponseDTO::fromArray($response);
    }

    public function cancelBill(string $id): BillResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/bill/{$id}/cancel");
        return BillResponseDTO::fromArray($response);
    }
}
