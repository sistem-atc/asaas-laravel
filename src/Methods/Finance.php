<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Response\Finance\BalanceResponseDTO;
use SistemAtc\Asaas\DTO\Request\Finance\CollectionStatisticsRequestDTO;
use SistemAtc\Asaas\DTO\Response\Finance\CollectionStatisticsResponseDTO;

class Finance extends BaseMethods
{
    public function RetrieveAccountBalance(): ?BalanceResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/finance/balance");
        return BalanceResponseDTO::fromArray($response);
    }

    public function collectionsStatistics(CollectionStatisticsRequestDTO $queryParams): ?CollectionStatisticsResponseDTO
    {
        $query = $queryParams ? '?' . http_build_query($queryParams->toArray()) : '';
        $endpoint = '/finance/payment/statistics' . $query;
        $response = $this->makeRequest(HttpMethod::GET, $endpoint);
        return CollectionStatisticsResponseDTO::fromArray($response);
    }

    public function retrieveSplitValues(): ?CollectionStatisticsResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/finance/split/statistics");
        return CollectionStatisticsResponseDTO::fromArray($response);
    }
}
