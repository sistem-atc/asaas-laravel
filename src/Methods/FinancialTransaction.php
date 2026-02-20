<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\FinancialTransaction\RetrieveExtractRequestDTO;
use SistemAtc\Asaas\DTO\Response\FinancialTransaction\RetrieveExtractResponseDTO;

class FinancialTransaction extends BaseMethods
{
    public function retrieveExtract(RetrieveExtractRequestDTO $queryParams): ?RetrieveExtractResponseDTO
    {
        $query = $queryParams ? '?' . http_build_query($queryParams->toArray()) : '';
        $endpoint = '/financialTransactions' . $query;
        $response = $this->makeRequest(HttpMethod::GET, $endpoint);
        return RetrieveExtractResponseDTO::fromArray($response);
    }
}
