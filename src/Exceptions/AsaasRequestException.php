<?php

namespace SistemAtc\Asaas\Exceptions;

use Illuminate\Http\Client\Response;
use RuntimeException;

class AsaasRequestException extends RuntimeException
{
    public readonly array $errors;
    public readonly int $httpStatus;

    public function __construct(Response $response)
    {
        $this->httpStatus = $response->status();
        $this->errors = $response->json('errors') ?? [];

        $firstError = $this->errors[0]['description'] ?? 'Erro desconhecido na API do Asaas.';
        $code = $this->errors[0]['code'] ?? 'UNKNOWN_ERROR';

        $message = "Asaas API Error [{$code}]: {$firstError}";

        parent::__construct($message, $this->httpStatus);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}