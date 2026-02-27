<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\MobilePhoneRecharge\RechargeRequestDTO;
use SistemAtc\Asaas\DTO\Response\MobilePhoneRecharge\RechargeResponseDTO;
use SistemAtc\Asaas\DTO\Request\MobilePhoneRecharge\ListCellPhonesRequestDTO;
use SistemAtc\Asaas\DTO\Response\MobilePhoneRecharge\ListCellPhonesResponseDTO;
use SistemAtc\Asaas\DTO\Response\MobilePhoneRecharge\SearchCellPhoneResponseDTO;

class MobilePhoneRecharge extends BaseMethods
{
    public function requestRecharge(RechargeRequestDTO $data): RechargeResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/mobilePhoneRecharges", $data->toArray());
        return RechargeResponseDTO::fromArray($response);
    }
    
    public function listCellPhoneTopups(ListCellPhonesRequestDTO $data): ListCellPhonesResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/mobilePhoneRecharges", $data->toArray());
        return ListCellPhonesResponseDTO::fromArray($response);
    }
    
    public function recoverSingleCellPhoneRecharge(string $id): RechargeResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/mobilePhoneRecharges/{$id}");
        return RechargeResponseDTO::fromArray($response);
    }
    
    public function cancelCellPhoneRecharge(string $id): RechargeResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/mobilePhoneRecharges/{$id}/cancel");
        return RechargeResponseDTO::fromArray($response);
    }
    
    public function searchCellPhoneProvider(string $phoneNumber): SearchCellPhoneResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/mobilePhoneRecharges/{$phoneNumber}/provider");
        return SearchCellPhoneResponseDTO::fromArray($response);
    }
}