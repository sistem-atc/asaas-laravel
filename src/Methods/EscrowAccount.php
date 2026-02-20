<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Response\EscrowAccount\EscrowResponseDTO;
use SistemAtc\Asaas\DTO\Request\EscrowAccount\EscrowAccountRequestDTO;
use SistemAtc\Asaas\DTO\Response\EscrowAccount\EscrowAccountResponseDTO;
use SistemAtc\Asaas\DTO\Response\EscrowAccount\FinishPaymentEscrowResponseDTO;

class EscrowAccount extends BaseMethods
{

    public function SaveOrUpdateEscrowAccount(string $id, EscrowAccountRequestDTO $data): ?EscrowAccountResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/accounts/{$id}/escrow", $data->toArray());
        return EscrowAccountResponseDTO::fromArray($response);
    }

    public function CreateDefaultEscrowAccount(EscrowAccountRequestDTO $data): ?EscrowAccountResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/accounts/escrow", $data->toArray());
        return EscrowAccountResponseDTO::fromArray($response);
    }

    public function FinishPaymentEscrow(string $id): ?FinishPaymentEscrowResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/escrow/{$id}/finish");
        return FinishPaymentEscrowResponseDTO::fromArray($response);
    }

    public function retrieveEscrowAccount(string $id): ?EscrowAccountResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/accounts/{$id}/escrow");
        return EscrowAccountResponseDTO::fromArray($response);
    }

    public function retrieveDefaultEscrowAccount(): ?EscrowAccountResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/accounts/escrow");
        return EscrowAccountResponseDTO::fromArray($response);
    }

    public function retrievePaymentEscrow(string $id): ?EscrowResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/payments/{$id}/escrow");
        return EscrowResponseDTO::fromArray($response);
    }
}
