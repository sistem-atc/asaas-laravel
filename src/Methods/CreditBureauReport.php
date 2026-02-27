<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\CreditBureauReport\MakeConsultationRequestDTO;
use SistemAtc\Asaas\DTO\Response\CreditBureauReport\MakeConsultationResponseDTO;
use SistemAtc\Asaas\DTO\Request\CreditBureauReport\ListCreditBureauReportsRequestDTO;
use SistemAtc\Asaas\DTO\Response\CreditBureauReport\ListCreditBureauReportsResponseDTO;

class CreditBureauReport extends BaseMethods
{

    public function makeConsultation(MakeConsultationRequestDTO $data): MakeConsultationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/creditBureauReport", $data);
        return MakeConsultationResponseDTO::fromArray($response);
    }

    public function listCreditBureauReports(ListCreditBureauReportsRequestDTO $data): ListCreditBureauReportsResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/creditBureauReport', $data);
        return ListCreditBureauReportsResponseDTO::fromArray($response);
    }

    public function retrieveCreditBureauReport(string $id): MakeConsultationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/creditBureauReport/{$id}");
        return MakeConsultationResponseDTO::fromArray($response);
    }
}