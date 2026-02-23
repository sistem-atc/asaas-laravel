<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Response\Chargeback\ChargebackResponseDTO;
use SistemAtc\Asaas\DTO\Request\Chargeback\ListChargebacksRequestDTO;
use SistemAtc\Asaas\DTO\Response\Chargeback\ListChargebackResponseDTO;
use SistemAtc\Asaas\DTO\Response\Chargeback\ChargebackDisputeResponseDTO;
use SistemAtc\Asaas\DTO\Request\Chargeback\CreateChargebackDisputeRequestDTO;

class Chargeback extends BaseMethods
{

    public function createChargebackDispute(string $id, CreateChargebackDisputeRequestDTO $data): ChargebackDisputeResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/chargebacks/{$id}/dispute", $data->toMultipart());
        return ChargebackDisputeResponseDTO::fromArray($response);
    }

    public function listChargebacks(ListChargebacksRequestDTO $queryParams): ListChargebackResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/chargebacks', $queryParams->toArray());
        return ListChargebackResponseDTO::fromArray($response);
    }

    public function retrieveSingleChargeback(?string $id): ChargebackResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/payments/{$id}/chargeback");
        return ChargebackResponseDTO::fromArray($response);
    }
}
