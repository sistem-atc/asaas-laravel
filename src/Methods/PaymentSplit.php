<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Shared\Common\Split;
use SistemAtc\Asaas\DTO\Request\PaymentSplit\ListSplitsRequestDTO;
use SistemAtc\Asaas\DTO\Response\PaymentSplit\ListSplitResponseDTO;

class PaymentSplit extends BaseMethods
{
    public function retrieveSinglePaidSplit(string $id): Split
    {
        $response = $this->makeRequest(HttpMethod::GET, "/payments/splits/paid/{$id}");
        return Split::fromArray($response);
    }
    
    public function listPaidSplits(ListSplitsRequestDTO $queryParams): ListSplitResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/payments/splits/paid", $queryParams->toArray());
        return ListSplitResponseDTO::fromArray($response);
    }
    
    public function retrieveSingleReceivedSplit(string $id): Split
    {
        $response = $this->makeRequest(HttpMethod::GET, "/payments/splits/received/{$id}");
        return Split::fromArray($response);
    }
    
    public function listReceivedSplits(ListSplitsRequestDTO $queryParams)
    {
        $response = $this->makeRequest(HttpMethod::GET, "/payments/splits/received", $queryParams->toArray());
        return ListSplitResponseDTO::fromArray($response);
    }
}
