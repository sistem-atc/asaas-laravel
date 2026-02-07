<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Response\AccountInfo\RetrieveWalletIdDTO;
use SistemAtc\Asaas\DTO\Request\AccountInfo\UpdateBusinessDataDTO;
use SistemAtc\Asaas\DTO\Response\AccountInfo\CheckAccountStatusDTO;
use SistemAtc\Asaas\DTO\Response\AccountInfo\RetrieveAccountFeesDTO;
use SistemAtc\Asaas\DTO\Response\AccountInfo\RetrieveBusinessDataDTO;
use SistemAtc\Asaas\DTO\Response\AccountInfo\CheckoutCustomizationDTO;
use SistemAtc\Asaas\DTO\Request\AccountInfo\UpdateCheckoutCustomizationDTO;
use SistemAtc\Asaas\DTO\Response\AccountInfo\DeleteWhiteLabelSubaccountDTO;
use SistemAtc\Asaas\DTO\Response\AccountInfo\RetrieveAsaasAccountNumberDTO;

class Accountinfo extends BaseMethods
{

    public function retrieveBusinessData(): RetrieveBusinessDataDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/myAccount/commercialInfo/');
        return RetrieveBusinessDataDTO::fromArray($response);
    }

    public function updateBusinessData(UpdateBusinessDataDTO $data): RetrieveBusinessDataDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, '/myAccount/commercialInfo/', $data->toArray());
        return RetrieveBusinessDataDTO::fromArray($response);
    }

    public function savePaymentCheckoutCustomization(UpdateCheckoutCustomizationDTO $data): CheckoutCustomizationDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, '/myAccount/paymentCheckoutConfig/', $data->toMultipart());
        return CheckoutCustomizationDTO::fromArray($response);
    }

    public function retrievePersonalizationSettings(): CheckoutCustomizationDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/myAccount/paymentCheckoutConfig/');
        return CheckoutCustomizationDTO::fromArray($response);
    }

    public function retrieveAsaasAccountNumber(): RetrieveAsaasAccountNumberDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/myAccount/accountNumber');
        return RetrieveAsaasAccountNumberDTO::fromArray($response);
    }

    public function retrieveAccountFees(): RetrieveAccountFeesDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/myAccount/fees/');
        return RetrieveAccountFeesDTO::fromArray($response);
    }

    public function checkAccountStatus(): CheckAccountStatusDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/myAccount/status/');
        return CheckAccountStatusDTO::fromArray($response);
    }

    public function retrieveWalletId(): RetrieveWalletIdDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/myAccount/walletId/');
        return RetrieveWalletIdDTO::fromArray($response);
    }

    public function deleteWhiteLabelSubaccount(string $removeReason): DeleteWhiteLabelSubaccountDTO
    {
        $response = $this->makeRequest(HttpMethod::DELETE, '/myAccount/?' . http_build_query(['removeReason' => $removeReason]));
        return DeleteWhiteLabelSubaccountDTO::fromArray($response);
    }
}
