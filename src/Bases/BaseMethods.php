<?php

namespace SistemAtc\Asaas\Bases;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;

abstract class BaseMethods
{

    protected PendingRequest $httpClient;

    public function __construct(PendingRequest $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    protected function makeRequest(string $method, string $endpoint, array $data = []): ?array
    {
        try {
            $response = $this->httpClient->$method($endpoint, $data);

            if ($response->failed()) {
                $this->handleError($response);
                return null;
            }

            return $response->json();

        } catch (RequestException $e) {
            Log::error('Asaas Connection Error: ' . $e->getMessage(), [
                'endpoint' => $endpoint,
                        'method'   => $method
            ]);

            return null;
        }

    }

    protected function handleError($response): void
    {
        $accessToken = (string) $response->header('asaas-access-token');
        $tokenIdentifier = $accessToken
            ? substr(hash('sha256', trim($accessToken)), 0, 12)
            : 'N/A';

        Log::warning('Asaas HTTP Request Error', [
            'token_id'   => $tokenIdentifier,
            'status'     => $response->status(),
            'url'        => $response->effectiveUri(),
            'payload'    => $response->json(),
            'ip_address' => request()->ip(),
        ]);
    }
}
