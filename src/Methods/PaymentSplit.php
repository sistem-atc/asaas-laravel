<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Shared\Common\Split;
use SistemAtc\Asaas\DTO\Request\PaymentSplit\ListPaidSplitsRequestDTO;
use SistemAtc\Asaas\DTO\Response\PaymentSplit\ListPaidSplitResponseDTO;

class PaymentSplit extends BaseMethods
{
    public function retrieveSinglePaidSplit(string $id): Split
    {
        $response = $this->makeRequest(HttpMethod::GET, "/payments/splits/paid/{$id}");
        return Split::fromArray($response);
    }
    
    public function listPaidSplits(ListPaidSplitsRequestDTO $queryParams): ListPaidSplitResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/payments/splits/paid", $queryParams->toArray());
        return ListPaidSplitResponseDTO::fromArray($response);
    }
    
    public function retrieveSingleReceivedSplit()
    {

    }
    
    public function listReceivedSplits()
    {

    }
    
}
