<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Response\Anticipation\ListAnticipationResponseDTO;
use SistemAtc\Asaas\DTO\Request\Anticipation\RequestAnticipationRequestDTO;
use SistemAtc\Asaas\DTO\Request\Anticipation\SimulateAnticipationRequestDTO;
use SistemAtc\Asaas\DTO\Response\Anticipation\SimulateAnticipationResponseDTO;
use SistemAtc\Asaas\DTO\Response\Anticipation\RetrieveAnticipationResponseDTO;
use SistemAtc\Asaas\DTO\Request\Anticipation\ListAnticipationFilterRequestDTO;
use SistemAtc\Asaas\DTO\Request\Anticipation\UpdateAutomaticAnticipationRequestDTO;
use SistemAtc\Asaas\DTO\Response\Anticipation\AutomaticAnticipationConfigResponseDTO;
use SistemAtc\Asaas\DTO\Response\Anticipation\RetrieveAnticipationLimitsResponseDTO;

class Anticipation extends BaseMethods
{

    public function retrieveSingleAnticipation(string $anticipationId): RetrieveAnticipationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/anticipations/{$anticipationId}");
        return RetrieveAnticipationResponseDTO::fromArray($response);
    }

    public function requestAnticipation(RequestAnticipationRequestDTO $data): RetrieveAnticipationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/anticipations", $data->toMultipart());
        return RetrieveAnticipationResponseDTO::fromArray($response);
    }

    public function listAnticipations(ListAnticipationFilterRequestDTO $queryParams): ListAnticipationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/anticipations', $queryParams->toArray());
        return ListAnticipationResponseDTO::fromArray($response);
    }

    public function simulateAnticipation(SimulateAnticipationRequestDTO $data): SimulateAnticipationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/anticipations/simulate", $data->toArray());
        return SimulateAnticipationResponseDTO::fromArray($response);
    }

    public function updateStatusAutomaticAnticipation(UpdateAutomaticAnticipationRequestDTO $data): AutomaticAnticipationConfigResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::PUT, "/anticipations/configurations", $data->toArray());
        return AutomaticAnticipationConfigResponseDTO::fromArray($response);
    }

    public function retrieveStatusAutomaticAnticipation(): AutomaticAnticipationConfigResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/anticipations/configurations");
        return AutomaticAnticipationConfigResponseDTO::fromArray($response);
    }

    public function retrieveAnticipationLimits(): RetrieveAnticipationLimitsResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/anticipations/limits");
        return RetrieveAnticipationLimitsResponseDTO::fromArray($response);
    }

    public function cancelAnticipation(string $anticipationId): RetrieveAnticipationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/anticipations/{$anticipationId}/cancel");
        return RetrieveAnticipationResponseDTO::fromArray($response);
    }
}
