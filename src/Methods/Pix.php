<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\Pix\ListKeysRequestDTO;
use SistemAtc\Asaas\DTO\Response\Pix\ListKeysResponseDTO;
use SistemAtc\Asaas\DTO\Response\Pix\QRCodeStaticResponseDTO;
use SistemAtc\Asaas\DTO\Response\Pix\PixAddressKeyResponseDTO;
use SistemAtc\Asaas\DTO\Request\Pix\CreateQRCodeStaticRequestDTO;
use SistemAtc\Asaas\DTO\Request\Pix\CreatePixAddressKeyRequestDTO;
use SistemAtc\Asaas\DTO\Response\Pix\DeleteQrCodeStaticResponseDTO;
use SistemAtc\Asaas\DTO\Response\Pix\AvailableTokenBucketCheckResponseDTO;

class Pix extends BaseMethods
{
    public function createKey(CreatePixAddressKeyRequestDTO $data): PixAddressKeyResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, '/pix/addressKeys', $data->toArray());
        return PixAddressKeyResponseDTO::fromArray($response);
    }
    
    public function listKeys(ListKeysRequestDTO $queryParams): ListKeysResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/pix/addressKeys', $queryParams->toArray());
        return ListKeysResponseDTO::fromArray($response);
    }
    
    public function retrieveSingleKey(string $id): PixAddressKeyResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/pix/addressKeys/{$id}");
        return PixAddressKeyResponseDTO::fromArray($response);
    }
    
    public function removeKey(string $id): PixAddressKeyResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::DELETE, "/pix/addressKeys/{$id}");
        return PixAddressKeyResponseDTO::fromArray($response);
    }
    
    public function createQrCodeStatic(CreateQRCodeStaticRequestDTO $data): QRCodeStaticResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, '/pix/qrCodes/static', $data->toArray());
        return QRCodeStaticResponseDTO::fromArray($response);
    }

    public function removeStaticQRCode(string $id): DeleteQrCodeStaticResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::DELETE, "/pix/qrCodes/static/{$id}");
        return DeleteQrCodeStaticResponseDTO::fromArray($response);
    }
    
    public function availableTokenBucketCheck(): AvailableTokenBucketCheckResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, 'pix/tokenBucket/addressKey');
        return AvailableTokenBucketCheckResponseDTO::fromArray($response);
    }  
}