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

    public function createAndUpdateTaxInformation(FiscalInfoRequestDTO $data): TaxInformationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/fiscalInfo", $data);
        return TaxInformationResponseDTO::fromArray($response);
        
    }

    public function retrieveTaxInformation(): TaxInformationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/fiscalInfo");
        return TaxInformationResponseDTO::fromArray($response);
    }

    public function listMunicipalServices(ListMunicipalServiceRequestDTO $data): ListMunicipalServicesResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/fiscalInfo/services', $data);
        return ListMunicipalServicesResponseDTO::fromArray($response);
    }

    public function listNBSCodes(ListNbsCodesRequestDTO $data): ListNbsCodesResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/fiscalInfo/nbsCodes', $data);
        return ListNbsCodesResponseDTO::fromArray($response);
    }

    public function configureInvoiceIssuingPortal(ConfgureInvoiceRequestDTO $data): ConfigureInvoiceResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/fiscalInfo/nationalPortal", $data);
        return ConfigureInvoiceResponseDTO::fromArray($response);
    }

    public function listFederalServiceCodes(ListCodesRequestDTO $data): ListCodesResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/fiscalInfo/federalServiceCodes', $data);
        return ListCodesResponseDTO::fromArray($response);
    }

    public function listOperationIndicatorCodes(ListCodesRequestDTO $data): ListCodesResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/fiscalInfo/operationIndicatorCodes', $data);
        return ListCodesResponseDTO::fromArray($response);
    }

    public function listTaxClassificationCodes(ListTaxClassificationRequestDTO $data): ListTaxClassificationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/fiscalInfo/taxClassificationCodes', $data);
        return ListTaxClassificationResponseDTO::fromArray($response);
    }

    public function listTaxSituationCodes(ListCodesRequestDTO $data): ListTaxSituationResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/fiscalInfo/taxSituationCodes', $data);
        return ListTaxSituationResponseDTO::fromArray($response);
    }
}