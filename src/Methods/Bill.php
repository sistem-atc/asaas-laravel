<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\Bill\CreateBillDTO;
use SistemAtc\Asaas\DTO\Response\Bill\BillResponseDTO;
use SistemAtc\Asaas\DTO\Response\Bill\ListBillResponseDTO;
use SistemAtc\Asaas\DTO\Request\Bill\SimulateBillPaymentDTO;
use SistemAtc\Asaas\DTO\Request\Bill\ListBillPaymentsFilterDTO;
use SistemAtc\Asaas\DTO\Response\Bill\SimulateBillPaymentResponseDTO;

class Bill extends BaseMethods
{

    public function createBill(CreateBillDTO $data): BillResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, '/bill', $data->toArray());
        return BillResponseDTO::fromArray($response);
    }

    public function listBill(ListBillPaymentsFilterDTO $queryParams): ListBillResponseDTO
    {
        $query = $queryParams ? '?' . http_build_query($queryParams->toArray()) : '';
        $endpoint = '/bill' . $query;
        $response = $this->makeRequest(HttpMethod::GET, $endpoint);
        return ListBillResponseDTO::fromArray($response);
    }

    public function simulateBillPayment(SimulateBillPaymentDTO $data)
    {
        $response = $this->makeRequest(HttpMethod::POST, "/bill/simulate", $data->toArray());
        return SimulateBillPaymentResponseDTO::fromArray($response);
    }

    public function retrieveSingleBill(string $id)
    {
        $response =  $this->makeRequest(HttpMethod::GET, "/bill/{$id}");
        return BillResponseDTO::fromArray($response);
    }

    public function cancelBill(string $id)
    {
        $response = $this->makeRequest(HttpMethod::POST, "/bill/{$id}/cancel");
        return BillResponseDTO::fromArray($response);
    }
}
