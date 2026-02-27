<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\Subaccount\SubAccountRequestDTO;
use SistemAtc\Asaas\DTO\Request\Subaccount\UpdateApiKeyRequestDTO;
use SistemAtc\Asaas\DTO\Response\Subaccount\SubAccountResponseDTO;
use SistemAtc\Asaas\DTO\Request\Subaccount\ListSubAccountRequestDTO;
use SistemAtc\Asaas\DTO\Response\Subaccount\ListSubAccountResponseDTO;
use SistemAtc\Asaas\DTO\Request\Subaccount\ApiKeySubAccountRequestDTO;
use SistemAtc\Asaas\DTO\Response\Subaccount\ListAccessTokenResponseDTO;
use SistemAtc\Asaas\DTO\Response\Subaccount\ApiKeySubAccountResponseDTO;
use SistemAtc\Asaas\DTO\Response\Subaccount\UpdateApiKeySubAccountResponseDTO;

class Subaccount extends BaseMethods
{
    public function createSubaccount(SubAccountRequestDTO $data): SubAccountResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, '/accounts', $data->toArray());
        return SubAccountResponseDTO::fromArray($response);
    }
    
    public function listSubaccounts(ListSubAccountRequestDTO $queryParams): ListSubAccountResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/accounts", $queryParams->toArray());
        return ListSubAccountResponseDTO::fromArray($response);
    }
    
    public function retrieveSingleSubaccount(string $id): SubAccountResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/accounts/{$id}");
        return SubAccountResponseDTO::fromArray($response);
    }
    
    public function createAPIkeyForSubaccount(string $id, ApiKeySubAccountRequestDTO $data): ApiKeySubAccountResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/accounts/{$id}/accessTokens", $data->toArray());
        return ApiKeySubAccountResponseDTO::fromArray($response);
    }
    
    public function listAPIkeysForSubaccount(string $id): ListAccessTokenResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/accounts/{$id}/accessTokens");
        return ListAccessTokenResponseDTO::fromArray($response);
    }
    
    public function updateAPIkeyForSubaccount(string $id, string $accessTokenId, UpdateApiKeyRequestDTO $data): UpdateApiKeySubAccountResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::PUT, "/accounts/{$id}/accessTokens/{$accessTokenId}", $data->toArray());
        return UpdateApiKeySubAccountResponseDTO::fromArray($response); 
    }
    
    public function deleteAPIkeyForSubaccount(string $id, string $accessTokenId): bool
    {
        $this->makeRequest(HttpMethod::DELETE, "/accounts/{$id}/accessTokens/{$accessTokenId}");
        return true;
    }
}