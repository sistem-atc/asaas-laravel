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
        $client = $this->httpClient;

        $isMultipart = isset($data[0]['name'], $data[0]['contents']);
        if ($isMultipart) {
           $client = $client->asMultipart();
        }

        $response = $client->{$method->value}($endpoint, $data);

        if ($response->failed()) {
            $this->handleError($response);
        }

        return $response->json() ?? [];
    }

    protected function handleError($response): void
    {
        Log::warning('Asaas HTTP Request Error', [
            'token_id'   => 'token not logged for security reasons',
            'status'     => $response->status(),
            'url'        => $response->effectiveUri(),
            'payload'    => $response->json(),
            'ip_address' => request()->ip(),
        ]);

        throw new AsaasRequestException($response);
    }
}
