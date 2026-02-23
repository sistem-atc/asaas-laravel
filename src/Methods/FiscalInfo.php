<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\FiscalInfo\ListCodesRequestDTO;
use SistemAtc\Asaas\DTO\Request\FiscalInfo\FiscalInfoRequestDTO;
use SistemAtc\Asaas\DTO\Response\FiscalInfo\ListCodesResponseDTO;
use SistemAtc\Asaas\DTO\Request\FiscalInfo\ListNbsCodesRequestDTO;
use SistemAtc\Asaas\DTO\Response\FiscalInfo\ListNbsCodesResponseDTO;
use SistemAtc\Asaas\DTO\Request\FiscalInfo\ConfgureInvoiceRequestDTO;
use SistemAtc\Asaas\DTO\Response\FiscalInfo\TaxInformationResponseDTO;
use SistemAtc\Asaas\DTO\Response\FiscalInfo\ListTaxSituationResponseDTO;
use SistemAtc\Asaas\DTO\Response\FiscalInfo\ConfigureInvoiceResponseDTO;
use SistemAtc\Asaas\DTO\Request\FiscalInfo\ListMunicipalServiceRequestDTO;
use SistemAtc\Asaas\DTO\Request\FiscalInfo\ListTaxClassificationRequestDTO;
use SistemAtc\Asaas\DTO\Response\FiscalInfo\ListTaxClassificationResponseDTO;
use SistemAtc\Asaas\DTO\Response\FiscalInfo\ListMunicipalServicesResponseDTO;
use SistemAtc\Asaas\DTO\Response\FiscalInfo\ListMunicipalConfigurationResponseDTO;

class FiscalInfo extends BaseMethods
{

    public function listMunicipalConfigurations(): ListMunicipalConfigurationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/fiscalInfo/municipalOptions");
        return ListMunicipalConfigurationResponseDTO::fromArray($response);
    }

    public function createAndUpdateTaxInformation(FiscalInfoRequestDTO $multipartData): TaxInformationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/fiscalInfo", $multipartData->toMultipart());
        return TaxInformationResponseDTO::fromArray($response);
        
    }

    public function retrieveTaxInformation(): TaxInformationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/fiscalInfo");
        return TaxInformationResponseDTO::fromArray($response);
    }

    public function listMunicipalServices(ListMunicipalServiceRequestDTO $queryParams): ListMunicipalServicesResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/fiscalInfo/services', $queryParams->toArray());
        return ListMunicipalServicesResponseDTO::fromArray($response);
    }

    public function listNBSCodes(ListNbsCodesRequestDTO $queryParams): ListNbsCodesResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/fiscalInfo/nbsCodes', $queryParams->toArray());
        return ListNbsCodesResponseDTO::fromArray($response);
    }

    public function configureInvoiceIssuingPortal(ConfgureInvoiceRequestDTO $data): ConfigureInvoiceResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/fiscalInfo/nationalPortal", $data->toArray());
        return ConfigureInvoiceResponseDTO::fromArray($response);
    }

    public function listFederalServiceCodes(ListCodesRequestDTO $queryParams): ListCodesResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/fiscalInfo/federalServiceCodes', $queryParams->toArray());
        return ListCodesResponseDTO::fromArray($response);
    }

    public function listOperationIndicatorCodes(ListCodesRequestDTO $queryParams): ListCodesResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/fiscalInfo/operationIndicatorCodes', $queryParams->toArray());
        return ListCodesResponseDTO::fromArray($response);
    }

    public function listTaxClassificationCodes(ListTaxClassificationRequestDTO $queryParams): ListTaxClassificationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/fiscalInfo/taxClassificationCodes', $queryParams->toArray());
        return ListTaxClassificationResponseDTO::fromArray($response);
    }

    public function listTaxSituationCodes(ListCodesRequestDTO $queryParams): ListTaxSituationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/fiscalInfo/taxSituationCodes', $queryParams->toArray());
        return ListTaxSituationResponseDTO::fromArray($response);
    }
}
