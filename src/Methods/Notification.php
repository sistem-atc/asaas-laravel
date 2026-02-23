<?php

namespace SistemAtc\Asaas\Methods;

use SistemAtc\Asaas\Enum\HttpMethod;
use SistemAtc\Asaas\Bases\BaseMethods;
use SistemAtc\Asaas\DTO\Request\Notification\UpdateNotificationRequestDTO;
use SistemAtc\Asaas\DTO\Shared\Response\Notification as NotificationResponse;
use SistemAtc\Asaas\DTO\Request\Notification\UpdateNotificationBatchRequestDTO;
use SistemAtc\Asaas\DTO\Response\Notification\UpdateNotificationBatchResponseDTO;

class Notification extends BaseMethods
{
    public function updateExistingNotification(string $id, UpdateNotificationRequestDTO $data): NotificationResponse
    {
        $response = $this->makeRequest(HttpMethod::PUT,"/notifications/{$id}",$data->toArray());
        return NotificationResponse::fromArray($response);
    }
    
    public function updateExistingNotificationsinBatch(UpdateNotificationBatchRequestDTO $data): UpdateNotificationBatchResponseDTO
    {
        $response = $this->makeRequest(HttpMethod::PUT,"/notifications/batch",$data->toArray());
        return UpdateNotificationBatchResponseDTO::fromArray($response);
    }
    
}
