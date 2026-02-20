<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\Transfer\ListTransferRequestDTO;
use SistemAtc\Asaas\DTO\Response\Transfer\ListTransferResponseDTO;
use SistemAtc\Asaas\DTO\Response\Transfer\TransferAsaasResponseDTO;
use SistemAtc\Asaas\DTO\Request\Transfer\TransferAsaasAccountRequestDTO;

class Transfer extends BaseMethods
{
    public function transferAnotherInstitutionAccountOrPixKey()
    {

    }

    public function listTransfers(ListTransferRequestDTO $queryParams): ?ListTransferResponseDTO
    {
        $query = $queryParams ? '?' . http_build_query($queryParams->toArray()) : '';
        $endpoint = '/transfers' . $query;
        $response = $this->makeRequest(HttpMethod::GET, $endpoint);
        return ListTransferResponseDTO::fromArray($response);
    }
    
    public function transferAsaasAccount(TransferAsaasAccountRequestDTO $data): ?TransferAsaasResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/transfers", $data->toArray());
        return TransferAsaasResponseDTO::fromArray($response);
    }
    
    public function retrieveSingleTransfer()
    {

    }
    
    public function cancelTransfer()
    {

    }

}
