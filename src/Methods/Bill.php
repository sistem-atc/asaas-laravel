<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\Bill\CreateBillDTO;
use SistemAtc\Asaas\DTO\Response\Bill\BillResponseDTO;

class Bill extends BaseMethods
{

    public function createBill(CreateBillDTO $data): BillResponseDTO
    {
        $reponse = $this->makeRequest(HttpMethod::POST, '/bill', $data->toArray());
        return BillResponseDTO::fromArray($reponse);
    }

    public function listBill(array $queryParams)
    {
        return $this->makeRequest(HttpMethod::GET, '/bill', $queryParams);
    }

    public function simulateBillPayment(string $id, array $data)
    {
        return $this->makeRequest(HttpMethod::POST, "/bill/{$id}/simulate-payment", $data);
    }

    public function retrieveSingleBill(string $id)
    {
        return $this->makeRequest(HttpMethod::GET, "/bill/{$id}");
    }

    public function cancelBill(string $id)
    {
        return $this->makeRequest(HttpMethod::POST, "/bill/{$id}/cancel");
    }
}
