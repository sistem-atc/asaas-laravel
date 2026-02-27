<?php

namespace SistemAtc\Asaas\Bases;

use Illuminate\Support\Facades\Log;
use SistemAtc\Asaas\Enum\HttpMethod;
use Illuminate\Http\Client\PendingRequest;
use SistemAtc\Asaas\Contracts\DTOInterface;
use SistemAtc\Asaas\Contracts\DTOInterfaceMultipart;
use SistemAtc\Asaas\Exceptions\AsaasRequestException;

abstract class BaseMethods
{
    protected PendingRequest $httpClient;

    public function __construct(PendingRequest $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    protected function makeRequest(
        HttpMethod $method, 
        string $endpoint, 
        DTOInterface|DTOInterfaceMultipart|null $data = null, 
        bool $returnRaw = false
    ): array|string|bool
    {
        if (str_contains($endpoint, '..') || str_contains($endpoint, '//')) {
            throw new \InvalidArgumentException("Invalid endpoint: {$endpoint}");
        }

        if (!str_starts_with($endpoint, '/')) {
            $endpoint = '/' . $endpoint;
        }

        $client = $this->httpClient;

        if ($data instanceof DTOInterfaceMultipart) {
            $client = $client->asMultipart();
            $payload = $data->toMultipart();
        } elseif ($data instanceof DTOInterface) {
            $client = $client->asJson();
            $payload = $data->toArray();
        } else {
            $client = $client->acceptJson();
        }
        
        $response = $payload === null ? $client->{$method->value}($endpoint) : $client->{$method->value}($endpoint, $payload);

        if ($response->failed()) {
            $this->handleError($response);
        }

        if ($response->noContent()) {
            return true;
        }

        $contentType = (string) $response->header('Content-Type');

        if ($returnRaw || str_contains($contentType, 'application/pdf')) {
            return $response->body();
        }

        return $response->json() ?? [];
    }

    protected function handleError($response): void
    {
        $e = new AsaasRequestException($response);
        Log::warning('Asaas HTTP Request Error', [
            'status'     => $e->status(),
            'url'        => $e->url(),
            'request_id' => $e->requestId(),
            'errors'     => $e->errors(),
            'payload'    => $e->responseJson(),
            'raw'        => $e->responseBody(),
            'ip_address' => app()->runningInConsole() ? null : request()->ip(),
        ]);
    
        throw $e;
    }
    
}
