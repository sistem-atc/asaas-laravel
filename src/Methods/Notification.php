<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\Notification\NotificationRequestDTO;
use SistemAtc\Asaas\DTO\Shared\Response\Notification as NotificationResponse;
use SistemAtc\Asaas\DTO\Request\Notification\UpdateNotificationBatchRequestDTO;
use SistemAtc\Asaas\DTO\Response\Notification\UpdateNotificationBatchResponseDTO;

class Notification extends BaseMethods
{
    public function updateExistingNotification(string $id, NotificationRequestDTO $data): NotificationResponse
    {
        $response = $this->makeRequest(HttpMethod::PUT,"/notifications/{$id}",$data);
        return NotificationResponse::fromArray($response);
    }
    
    public function updateExistingNotificationsinBatch(UpdateNotificationBatchRequestDTO $data): UpdateNotificationBatchResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::PUT,"/notifications/batch",$data);
        return UpdateNotificationBatchResponseDTO::fromArray($response);
    }
}