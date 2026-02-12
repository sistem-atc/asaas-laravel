<?php

namespace SistemAtc\Asaas\Exceptions;

use Illuminate\Http\Client\Response;
use RuntimeException;

class AsaasRequestException extends RuntimeException
{
    /** @var array<int, array{code: string, description: string, field?: string|null}> */
    private array $errors = [];

    private int $httpStatus;
    private string $url;
    private array $headers;
    private ?array $responseJson;
    private ?string $responseBody;
    private ?string $requestId;

    public function __construct(Response $response, ?string $customMessage = null)
    {
        $this->httpStatus = $response->status();
        $this->url = (string) $response->effectiveUri();
        $this->headers = $response->headers();

        $this->responseJson = $this->safeJson($response);

        $body = $response->body();
        $this->responseBody = $body !== '' ? mb_substr($body, 0, 8000) : null;

        $this->requestId = $this->extractRequestId($this->headers);

        $this->errors = $this->normalizeErrors($this->responseJson);

        [$firstCode, $firstDesc] = $this->firstError();
        $baseMessage = $customMessage ?? "Asaas API Error [{$firstCode}] ({$this->httpStatus})";
        $message = $firstDesc !== '' ? "{$baseMessage}: {$firstDesc}" : $baseMessage;

        parent::__construct($message, $this->httpStatus);
    }

    /** @return array<int, array{code: string, description: string, field?: string|null}> */
    public function errors(): array
    {
        return $this->errors;
    }

    public function status(): int
    {
        return $this->httpStatus;
    }

    public function url(): string
    {
        return $this->url;
    }

    public function requestId(): ?string
    {
        return $this->requestId;
    }

    public function headers(): array
    {
        return $this->headers;
    }

    public function responseJson(): ?array
    {
        return $this->responseJson;
    }

    public function responseBody(): ?string
    {
        return $this->responseBody;
    }

    public function isClientError(): bool
    {
        return $this->httpStatus >= 400 && $this->httpStatus < 500;
    }

    public function isServerError(): bool
    {
        return $this->httpStatus >= 500;
    }

    public function isRateLimited(): bool
    {
        return $this->httpStatus === 429;
    }

    /** @return array{0: string, 1: string} */
    private function firstError(): array
    {
        if (!empty($this->errors)) {
            $first = $this->errors[0];
            return [$first['code'] ?? 'UNKNOWN_ERROR', $first['description'] ?? ''];
        }

        $msg = $this->responseJson['message'] ?? '';
        return ['UNKNOWN_ERROR', is_string($msg) ? $msg : ''];
    }

    private function safeJson(Response $response): ?array
    {
        try {
            $json = $response->json();
            return is_array($json) ? $json : null;
        } catch (\Throwable) {
            return null;
        }
    }

    /**
     * @return array<int, array{code: string, description: string, field?: string|null}>
     */
    private function normalizeErrors(?array $json): array
    {
        if (!$json) {
            return [[
                'code' => 'NON_JSON_RESPONSE',
                'description' => $this->responseBody ?? 'Resposta não-JSON da API.',
                'field' => null,
            ]];
        }

        if (isset($json['errors']) && is_array($json['errors'])) {
            $out = [];
            foreach ($json['errors'] as $err) {
                if (!is_array($err)) continue;
                $out[] = [
                    'code' => (string) ($err['code'] ?? 'UNKNOWN_ERROR'),
                    'description' => (string) ($err['description'] ?? ($err['message'] ?? 'Erro desconhecido.')),
                    'field' => isset($err['field']) ? (string) $err['field'] : null,
                ];
            }
            return $out ?: [[
                'code' => 'UNKNOWN_ERROR',
                'description' => 'Erro desconhecido na API do Asaas.',
                'field' => null,
            ]];
        }

        if (isset($json['error']) && is_array($json['error'])) {
            return [[
                'code' => (string) ($json['error']['code'] ?? 'UNKNOWN_ERROR'),
                'description' => (string) ($json['error']['description'] ?? ($json['error']['message'] ?? 'Erro desconhecido.')),
                'field' => isset($json['error']['field']) ? (string) $json['error']['field'] : null,
            ]];
        }

        if (isset($json['message']) && is_string($json['message'])) {
            return [[
                'code' => 'MESSAGE_ONLY',
                'description' => $json['message'],
                'field' => null,
            ]];
        }

        return [[
            'code' => 'UNKNOWN_ERROR',
            'description' => 'Erro desconhecido na API do Asaas.',
            'field' => null,
        ]];
    }

    private function extractRequestId(array $headers): ?string
    {
        $candidates = [
            'X-Request-Id',
            'X-Request-ID',
            'Request-Id',
            'Request-ID',
            'X-Correlation-Id',
            'X-Correlation-ID',
        ];

        foreach ($candidates as $name) {
            foreach ($headers as $headerName => $values) {
                if (strcasecmp($headerName, $name) === 0) {
                    $value = is_array($values) ? ($values[0] ?? null) : $values;
                    return is_string($value) && $value !== '' ? $value : null;
                }
            }
        }

        return null;
    }
}
