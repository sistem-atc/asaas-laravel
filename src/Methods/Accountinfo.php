<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\AccountInfo\UpdateBusinessDataDTO;
use SistemAtc\Asaas\DTO\Response\AccountInfo\RetrieveBusinessDataDTO;
use SistemAtc\Asaas\DTO\Request\AccountInfo\UpdateCheckoutCustomizationDTO;
use SistemAtc\Asaas\DTO\Response\AccountInfo\CheckAccountStatusDTO;
use SistemAtc\Asaas\DTO\Response\AccountInfo\CheckoutCustomizationDTO;
use SistemAtc\Asaas\DTO\Response\AccountInfo\DeleteWhiteLabelSubaccountDTO;
use SistemAtc\Asaas\DTO\Response\AccountInfo\RetrieveAccountFeesDTO;
use SistemAtc\Asaas\DTO\Response\AccountInfo\RetrieveAsaasAccountNumberDTO;
use SistemAtc\Asaas\DTO\Response\AccountInfo\RetrieveWalletIdDTO;

class Accountinfo extends BaseMethods
{

    public function retrieveBusinessData(): RetrieveBusinessDataDTO
    {
        $response = $this->makeRequest('get', '/myAccount/commercialInfo/');
        return RetrieveBusinessDataDTO::fromArray($response);
    }

    public function updateBusinessData(UpdateBusinessDataDTO $data): RetrieveBusinessDataDTO
    {
        $response = $this->makeRequest('post', '/myAccount/commercialInfo/', $data->toArray());
        return RetrieveBusinessDataDTO::fromArray($response);
    }

    public function savePaymentCheckoutCustomization(UpdateCheckoutCustomizationDTO $data): CheckoutCustomizationDTO
    {
        $response = $this->makeRequest('post', '/myAccount/paymentCheckoutConfig/', $data->toMultipart());
        return CheckoutCustomizationDTO::fromArray($response);
    }

    public function retrievePersonalizationSettings(): CheckoutCustomizationDTO
    {
        $response = $this->makeRequest('get', '/myAccount/paymentCheckoutConfig/');
        return CheckoutCustomizationDTO::fromArray($response);
    }

    public function retrieveAsaasAccountNumber(): RetrieveAsaasAccountNumberDTO
    {
        $response = $this->makeRequest('get', '/myAccount/accountNumber');
        return RetrieveAsaasAccountNumberDTO::fromArray($response);
    }

    public function retrieveAccountFees(): RetrieveAccountFeesDTO
    {
        $response = $this->makeRequest('get', '/myAccount/fees/');
        return RetrieveAccountFeesDTO::fromArray($response);
    }

    public function checkAccountStatus(): CheckAccountStatusDTO
    {
        $response = $this->makeRequest('get', '/myAccount/status/');
        return CheckAccountStatusDTO::fromArray($response);
    }

    public function retrieveWalletId(): RetrieveWalletIdDTO
    {
        $response = $this->makeRequest('get', '/myAccount/walletId/');
        return RetrieveWalletIdDTO::fromArray($response);
    }

    public function deleteWhiteLabelSubaccount(string $removeReason): DeleteWhiteLabelSubaccountDTO
    {
        $response = $this->makeRequest('delete', '/myAccount/?' . http_build_query(['removeReason' => $removeReason]));
        return DeleteWhiteLabelSubaccountDTO::fromArray($response);
    }
}
