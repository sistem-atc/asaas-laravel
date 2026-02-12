<?php

namespace SistemAtc\Asaas\Bases;

use Illuminate\Support\Facades\Log;
use SistemAtc\Asaas\Enum\HttpMethod;
use Illuminate\Http\Client\PendingRequest;
use SistemAtc\Asaas\Exceptions\AsaasRequestException;

abstract class BaseMethods
{
    protected PendingRequest $httpClient;

    public function __construct(PendingRequest $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    protected function makeRequest(HttpMethod $method, string $endpoint, array $data = []): array
    {
        if (str_contains($endpoint, '..') || str_contains($endpoint, '//')) {
            throw new \InvalidArgumentException("Invalid endpoint: {$endpoint}");
        }

        if (!str_starts_with($endpoint, '/')) {
            $endpoint = '/' . $endpoint;
        }

        $client = $this->httpClient;

        $isMultipart = isset($data[0]['name'], $data[0]['contents']);
        if ($isMultipart) {
           $client = $client->asMultipart();
        }

        if ($method === HttpMethod::GET) {
            $response = $client->{$method->value}($endpoint);
        } else {
            $response = $client->{$method->value}($endpoint, $data);
        }

        if ($response->failed()) {
            $this->handleError($response);
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
