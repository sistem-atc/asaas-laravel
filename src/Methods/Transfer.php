<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\Transfer\ListTransferRequestDTO;
use SistemAtc\Asaas\DTO\Response\Transfer\ListTransferResponseDTO;
use SistemAtc\Asaas\DTO\Response\Transfer\TransferAsaasResponseDTO;
use SistemAtc\Asaas\DTO\Response\Transfer\TranferAnotherResponseDTO;
use SistemAtc\Asaas\DTO\Request\Transfer\TransferAsaasAccountRequestDTO;
use SistemAtc\Asaas\DTO\Request\Transfer\TransferAnotherInstitutionRequestDTO;

class Transfer extends BaseMethods
{
    public function transferAnotherInstitutionAccountOrPixKey(TransferAnotherInstitutionRequestDTO $data): TranferAnotherResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/transfers", $data->toArray());
        return TranferAnotherResponseDTO::fromArray($response);
    }

    public function listTransfers(ListTransferRequestDTO $queryParams): ListTransferResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/transfers', $queryParams->toArray());
        return ListTransferResponseDTO::fromArray($response);
    }
    
    public function transferAsaasAccount(TransferAsaasAccountRequestDTO $data): TransferAsaasResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/transfers", $data->toArray());
        return TransferAsaasResponseDTO::fromArray($response);
    }
    
    public function retrieveSingleTransfer(string $id): TranferAnotherResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/transfers/{$id}");
        return TranferAnotherResponseDTO::fromArray($response);
    }
    
    public function cancelTransfer(string $id): TranferAnotherResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::DELETE, "/transfers/{$id}/cancel");
        return TranferAnotherResponseDTO::fromArray($response);
    }
}
