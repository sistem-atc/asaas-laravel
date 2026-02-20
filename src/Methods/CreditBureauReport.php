<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\CreditBureauReport\MakeConsultationRequestDTO;
use SistemAtc\Asaas\DTO\Request\CreditBureauReport\MakeConsultationResponseDTO;
use SistemAtc\Asaas\DTO\Request\CreditBureauReport\ListCreditBureauReportsRequestDTO;
use SistemAtc\Asaas\DTO\Request\CreditBureauReport\ListCreditBureauReportsResponseDTO;

class CreditBureauReport extends BaseMethods
{

    public function makeConsultation(MakeConsultationRequestDTO $data): ?MakeConsultationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/creditBureauReport", $data->toArray());
        return MakeConsultationResponseDTO::fromArray($response);
    }

    public function listCreditBureauReports(ListCreditBureauReportsRequestDTO $queryParams): ?ListCreditBureauReportsResponseDTO
    {
        $query = $queryParams ? '?' . http_build_query($queryParams->toArray()) : '';
        $endpoint = '/creditBureauReport' . $query;
        $response = $this->makeRequest(HttpMethod::GET, $endpoint);
        return ListCreditBureauReportsResponseDTO::fromArray($response);
    }

    public function retrieveCreditBureauReport(string $id): ?MakeConsultationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/creditBureauReport/{$id}");
        return MakeConsultationResponseDTO::fromArray($response);
    }
}
