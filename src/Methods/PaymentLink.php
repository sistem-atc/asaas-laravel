<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\PaymentLink\PaymentLinkRequestDTO;
use SistemAtc\Asaas\DTO\Response\PaymentLink\PaymentLinkResponseDTO;
use SistemAtc\Asaas\DTO\Request\PaymentLink\ListPaymentLinkRequestDTO;
use SistemAtc\Asaas\DTO\Response\PaymentLink\ListPaymentLinkResponseDTO;
use SistemAtc\Asaas\DTO\Response\PaymentLink\ImagePaymentLinkResponseDTO;
use SistemAtc\Asaas\DTO\Request\PaymentLink\AddImagePaymentLinkRequestDTO;
use SistemAtc\Asaas\DTO\Response\PaymentLink\DeletePaymentLinkResponseDTO;
use SistemAtc\Asaas\DTO\Response\PaymentLink\ListImagePaymentLinkResponseDTO;

class PaymentLink extends BaseMethods
{
    public function createPaymentsLink(PaymentLinkRequestDTO $data): PaymentLinkResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/paymentLinks", $data);
        return PaymentLinkResponseDTO::fromArray($response);
    }
    
    public function listPaymentsLinks(ListPaymentLinkRequestDTO $data): ListPaymentLinkResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/paymentLinks", $data);
        return ListPaymentLinkResponseDTO::fromArray($response);
    }
    
    public function updatePaymentsLink(string $id, PaymentLinkRequestDTO $data): PaymentLinkResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::PUT, "/paymentLinks/{$id}", $data);
        return PaymentLinkResponseDTO::fromArray($response);
    }
    
    public function retrieveSinglePaymentsLink(string $id): PaymentLinkResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/paymentLinks/{$id}");
        return PaymentLinkResponseDTO::fromArray($response);
    }
    
    public function removePaymentsLink(string $id): DeletePaymentLinkResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::DELETE, "/paymentLinks/{$id}");
        return DeletePaymentLinkResponseDTO::fromArray($response);
    }
    
    public function restorePaymentsLink(string $id): PaymentLinkResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/paymentLinks/{$id}/restore");
        return PaymentLinkResponseDTO::fromArray($response);
    }
    
    public function addImagePaymentsLink(string $id, AddImagePaymentLinkRequestDTO $data): ImagePaymentLinkResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/paymentLinks/{$id}/images", $data);
        return ImagePaymentLinkResponseDTO::fromArray($response);
    }
    
    public function listImagesPaymentsLink(string $id): ListImagePaymentLinkResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/paymentLinks/{$id}/images");
        return ListImagePaymentLinkResponseDTO::fromArray($response);
    }
    
    public function retrieveSinglePaymentsLinkImage(string $paymentLinkId, string $imageId): ImagePaymentLinkResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/paymentLinks/{$paymentLinkId}/images/{$imageId}");
        return ImagePaymentLinkResponseDTO::fromArray($response);
    }
    
    public function removeImageFromPaymentsLink(string $paymentLinkId, string $imageId): DeletePaymentLinkResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::DELETE, "/paymentLinks/{$paymentLinkId}/images/{$imageId}");
        return DeletePaymentLinkResponseDTO::fromArray($response);
    }
    
    public function setPaymentsLinkMainImage(string $paymentLinkId, string $imageId): ImagePaymentLinkResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::PUT, "/paymentLinks/{$paymentLinkId}/images/{$imageId}/setAsMain");
        return ImagePaymentLinkResponseDTO::fromArray($response);
    }   
}