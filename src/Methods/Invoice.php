<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Response\Invoice\InvoiceResponseDTO;
use SistemAtc\Asaas\DTO\Request\Invoice\ListInvoicesRequestDTO;
use SistemAtc\Asaas\DTO\Request\Invoice\CancelInvoiceRequestDTO;
use SistemAtc\Asaas\DTO\Request\Invoice\UpdateInvoiceRequestDTO;
use SistemAtc\Asaas\DTO\Response\Invoice\ListInvoiceResponseDTO;
use SistemAtc\Asaas\DTO\Request\Invoice\ScheduleInvoiceRequestDTO;

class Invoice extends BaseMethods
{
    public function scheduleInvoice(ScheduleInvoiceRequestDTO $data): InvoiceResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/invoices", $data->toArray());
        return InvoiceResponseDTO::fromArray($response);
    }

    public function listInvoices(ListInvoicesRequestDTO $queryParams): ListInvoiceResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/invoices", $queryParams->toArray());
        return ListInvoiceResponseDTO::fromArray($response);
    }
    
    public function updateInvoice(string $id, UpdateInvoiceRequestDTO $data): InvoiceResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::PUT, "/invoices/$id", $data->toArray());
        return InvoiceResponseDTO::fromArray($response);
    }
    
    public function retrieveSingleInvoice(string $id): InvoiceResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::GET, "/invoices/{$id}");
        return InvoiceResponseDTO::fromArray($response);
    }
    
    public function issueInvoice(string $id): InvoiceResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/invoices/{$id}/authorize");
        return InvoiceResponseDTO::fromArray($response);
    }
    
    public function cancelInvoice(string $id, CancelInvoiceRequestDTO $data): InvoiceResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::POST, "/invoices/{$id}/cancel", $data->toArray());
        return InvoiceResponseDTO::fromArray($response);
    }
}