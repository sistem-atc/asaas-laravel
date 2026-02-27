<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\RecurringPix\ListRecurrencesRequestDTO;
use SistemAtc\Asaas\DTO\Response\RecurringPix\ListRecurrenceResponseDTO;
use SistemAtc\Asaas\DTO\Response\RecurringPix\SingleRecurrenceResponseDTO;
use SistemAtc\Asaas\DTO\Request\RecurringPix\ListRecurrencesItemsRequestDTO;
use SistemAtc\Asaas\DTO\Response\RecurringPix\ListItemsRecurrenceResponseDTO;

class RecurringPix extends BaseMethods
{
    public function listRecurrences(ListRecurrencesRequestDTO $queryParams): ListRecurrenceResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, '/pix/transactions/recurrings', $queryParams->toArray());
        return ListRecurrenceResponseDTO::fromArray($response);
    }
    
    public function retrieveSingleRecurrence(string $id): SingleRecurrenceResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/pix/transactions/recurrings/{$id}");
        return SingleRecurrenceResponseDTO::fromArray($response);
    }
    
    public function cancelRecurrence(string $id): SingleRecurrenceResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/pix/transactions/recurrings/{$id}/cancel");
        return SingleRecurrenceResponseDTO::fromArray($response);
    }
    
    public function listRecurrenceItems(string $id, ListRecurrencesItemsRequestDTO $queryParams): ListItemsRecurrenceResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/pix/transactions/recurrings/{$id}/items", $queryParams->toArray());
        return ListItemsRecurrenceResponseDTO::fromArray($response);
    }
    
    public function cancelRecurrenceItem(string $id): SingleRecurrenceResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/pix/transactions/recurrings/items/{$id}/cancel");
        return SingleRecurrenceResponseDTO::fromArray($response);
    }
}
