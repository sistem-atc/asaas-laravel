<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\Webhook\CreateRequestDTO;
use SistemAtc\Asaas\DTO\Response\Webhook\WebhookResponseDTO;
use SistemAtc\Asaas\DTO\Request\Webhook\ListWebhooksRequestDTO;
use SistemAtc\Asaas\DTO\Request\Webhook\UpdateWebhookRequestDTO;
use SistemAtc\Asaas\DTO\Response\Webhook\ListWebhookResponseDTO;
use SistemAtc\Asaas\DTO\Response\Webhook\DeleteWebhookResponseDTO;

class Webhook extends BaseMethods
{
    public function createNewWebhook(CreateRequestDTO $data): WebhookResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/webhooks", $data->toArray());
        return WebhookResponseDTO::fromArray($response);
    }

    public function listWebhooks(ListWebhooksRequestDTO $queryParams): ListWebhookResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/webhooks', $queryParams->toArray());
        return ListWebhookResponseDTO::fromArray($response);
    }
    
    public function retrieveSingleWebhook(string $id): WebhookResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/webhooks/{$id}");
        return WebhookResponseDTO::fromArray($response);
    }
    
    public function updateExistingWebhook(string $id, UpdateWebhookRequestDTO $data): WebhookResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::PUT, "/webhooks/{$id}", $data->toArray());
        return WebhookResponseDTO::fromArray($response);
    }
    
    public function removeWebhook(string $id): DeleteWebhookResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::DELETE, "/webhooks/{$id}");
        return DeleteWebhookResponseDTO::fromArray($response);
    }
    
    public function removeWebhookBackoff(string $id): bool
    {
        $this->makeRequest(HttpMethod::POST, "/webhooks/{$id}/removeBackoff");
        return true;
    }
}