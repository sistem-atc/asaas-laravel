<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\FinancialTransaction\RetrieveExtractRequestDTO;
use SistemAtc\Asaas\DTO\Response\FinancialTransaction\RetrieveExtractResponseDTO;

class FinancialTransaction extends BaseMethods
{
    public function retrieveExtract(RetrieveExtractRequestDTO $data): RetrieveExtractResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/financialTransactions', $data);
        return RetrieveExtractResponseDTO::fromArray($response);
    }
}