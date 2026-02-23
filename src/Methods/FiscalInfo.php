<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\FiscalInfo\ConfgureInvoiceRequestDTO;
use SistemAtc\Asaas\DTO\Response\FiscalInfo\TaxInformationResponseDTO;
use SistemAtc\Asaas\DTO\Request\FiscalInfo\ListMunicipalServiceRequestDTO;
use SistemAtc\Asaas\DTO\Request\FiscalInfo\ListNbsCodesRequestDTO;
use SistemAtc\Asaas\DTO\Response\FiscalInfo\ListMunicipalConfigurationResponseDTO;
use SistemAtc\Asaas\DTO\Response\FiscalInfo\ListMunicipalServicesResponseDTO;
use SistemAtc\Asaas\DTO\Response\FiscalInfo\ListNbsCodesResponseDTO;

class FiscalInfo extends BaseMethods
{

    public function listMunicipalConfigurations(): ?ListMunicipalConfigurationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/fiscalInfo/municipalOptions");
        return ListMunicipalConfigurationResponseDTO::fromArray($response);
    }

    public function createAndUpdateTaxInformation()
    {

    }

    public function retrieveTaxInformation(): ?TaxInformationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/fiscalInfo");
        return TaxInformationResponseDTO::fromArray($response);
    }

    public function listMunicipalServices(ListMunicipalServiceRequestDTO $queryParams): ?ListMunicipalServicesResponseDTO
    {
        $query = $queryParams ? '?' . http_build_query($queryParams->toArray()) : '';
        $endpoint = '/fiscalInfo/services' . $query;
        $response = $this->makeRequest(HttpMethod::GET, $endpoint);
        return ListMunicipalServicesResponseDTO::fromArray($response);

    }

    public function listNBSCodes(ListNbsCodesRequestDTO $queryParams): ?ListNbsCodesResponseDTO
    {
        $query = $queryParams ? '?' . http_build_query($queryParams->toArray()) : '';
        $endpoint = '/fiscalInfo/nbsCodes' . $query;
        $response = $this->makeRequest(HttpMethod::GET, $endpoint);
        return ListNbsCodesResponseDTO::fromArray($response);
    }

    public function configureInvoiceIssuingPortal(ConfgureInvoiceRequestDTO $data)
    {
        $response = $this->makeRequest(HttpMethod::POST, "/fiscalInfo/nationalPortal", $data->toArray());
    }

    public function listFederalServiceCodes()
    {

    }

    public function listOperationIndicatorCodes()
    {

    }

    public function listTaxClassificationCodes()
    {

    }

    public function listTaxSituationCodes()
    {
        
    }
}
