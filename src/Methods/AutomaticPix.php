<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\Anticipation\CreateAuthorization;
use SistemAtc\Asaas\DTO\Request\Anticipation\CreateAuthorizationResponseDTO;

class AutomaticPix extends BaseMethods
{

    public function createAuthorization(CreateAuthorization $data): CreateAuthorizationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/pix/automatic/authorizations", $data->toArray());
        return CreateAuthorizationResponseDTO::fromArray($response);
    }

    public function listAuthorization()
    {

    }

    public function retrieveSingleAuthorization()
    {

    }

    public function cancelAuthorization()
    {

    }

    public function retrieveSinglePaymentInstruction()
    {

    }

    public function listPaymentInstruction()
    {
        
    }
}
