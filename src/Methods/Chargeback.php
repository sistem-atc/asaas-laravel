<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\Chargeback\ListChargebacksDTO;
use SistemAtc\Asaas\DTO\Response\Chargeback\ChargebackResponseDTO;
use SistemAtc\Asaas\DTO\Response\Chargeback\ListChargebackResponseDTO;
use SistemAtc\Asaas\DTO\Response\Chargeback\ChargebackDisputeResponseDTO;
use SistemAtc\Asaas\DTO\Request\AccountDocument\CreateChargebackDisputeDTO;

class Chargeback extends BaseMethods
{

    public function createChargebackDispute(string $id, CreateChargebackDisputeDTO $data): ChargebackDisputeResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/chargebacks/{$id}/dispute", $data->toMultipart());
        return ChargebackDisputeResponseDTO::fromArray($response);
    }

    public function listChargebacks(ListChargebacksDTO $queryParams): ListChargebackResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/chargebacks?" . http_build_query($queryParams->toArray()));
        return ListChargebackResponseDTO::fromArray($response);
    }

    public function retrieveSingleChargeback(?string $id): ChargebackResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/payments/{$id}/chargeback");
        return ChargebackResponseDTO::fromArray($response);
    }
}
