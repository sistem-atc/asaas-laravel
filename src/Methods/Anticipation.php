<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Response\Anticipation\ListAnticipationDTO;
use SistemAtc\Asaas\DTO\Request\Anticipation\RequestAnticipationDTO;
use SistemAtc\Asaas\DTO\Request\Anticipation\SimulateAnticipationDTO;
use SistemAtc\Asaas\DTO\Response\Anticipation\RetrieveAnticipationDTO;
use SistemAtc\Asaas\DTO\Request\Anticipation\ListAnticipationFilterDTO;
use SistemAtc\Asaas\DTO\Request\Anticipation\UpdateAutomaticAnticipationDTO;
use SistemAtc\Asaas\DTO\Response\Anticipation\AutomaticAnticipationConfigDTO;
use SistemAtc\Asaas\DTO\Response\Anticipation\RetrieveAntecipationLimitsDTO;
use SistemAtc\Asaas\DTO\Response\Anticipation\SimulateAnticipationDTO as ResponseSimulateAnticipationDTO;

class Anticipation extends BaseMethods
{

    public function retrieveSingleAntecipation(string $anticipationId): RetrieveAnticipationDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/anticipations/{$anticipationId}");
        return RetrieveAnticipationDTO::fromArray($response);
    }

    public function requestAntecipation(RequestAnticipationDTO $data): RetrieveAnticipationDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/anticipations", $data->toMultipart());
        return RetrieveAnticipationDTO::fromArray($response);
    }

    public function listAntecipations(ListAnticipationFilterDTO $queryParams): ListAnticipationDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/anticipations?" . http_build_query($queryParams->toArray()));
        return ListAnticipationDTO::fromArray($response);
    }

    public function simulateAntecipation(SimulateAnticipationDTO $data): ResponseSimulateAnticipationDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/anticipations/simulate", $data->toArray());
        return ResponseSimulateAnticipationDTO::fromArray($response);
    }

    public function updateStatusAutomaticAntecipation(UpdateAutomaticAnticipationDTO $data): AutomaticAnticipationConfigDTO
    {
        $response = $this->makeRequest(HttpMethod::PUT, "/anticipations/configurations", $data->toArray());
        return AutomaticAnticipationConfigDTO::fromArray($response);
    }

    public function retrieveStatusAutomaticAntecipation(): AutomaticAnticipationConfigDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/anticipations/configurations");
        return AutomaticAnticipationConfigDTO::fromArray($response);
    }

    public function retrieveAntecipationLimits(): RetrieveAntecipationLimitsDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/anticipations/limits");
        return RetrieveAntecipationLimitsDTO::fromArray($response);
    }

    public function cancelAntecipation(string $anticipationId): RetrieveAnticipationDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/anticipations/{$anticipationId}/cancel");
        return RetrieveAnticipationDTO::fromArray($response);
    }
}
