<?php

namespace SistemAtc\Asaas\Webhooks;

use App\Models\User;
use Filament\Notifications\Notification;
use SistemAtc\Asaas\Bases\BaseAsaasHandler;
use SistemAtc\Asaas\DTO\Webhook\AccountWebhookDTO;
use SistemAtc\Asaas\Contracts\WebhookEventDTOInterface;
use SistemAtc\Asaas\Traits\HandlesIdempotency;

/**
 *
 * @property AccountWebhookDTO $event
 */
class AccountHandler extends BaseAsaasHandler
{

    use HandlesIdempotency;

    public function __invoke(WebhookEventDTOInterface $eventDTO, string $method): void
    {
        $this->setEvent($eventDTO);
        if ($this->wasAlreadyProcessed($this->event->id)) return;
        $this->{$method}();
    }

    public function statusBankAccountInfoApproved(): void
    {
        // Stay to implements
    }

    public function statusBankAccountInfoAwaitingApproval(): void
    {
        // Stay to implements
    }

    public function statusBankAccountInfoPending(): void
    {
        // Stay to implements
    }

    public function statusBankAccountInfoRejected(): void
    {
        // Stay to implements
    }

    public function statusCommercialInfoApproved(): void
    {
        // Stay to implements
    }

    public function statusCommercialInfoAwaitingApproval(): void
    {
        // Stay to implements
    }

    public function statusCommercialInfoPending(): void
    {
        // Stay to implements
    }

    public function statusCommercialInfoRejected(AccountWebhookDTO $event): void
    {
        $this->sendNotification($event);
    }

    public function statusDocumentApproved(AccountWebhookDTO $event): void
    {
        $this->sendNotification($event);
    }

    public function statusDocumentAwaitingApproval(AccountWebhookDTO $event): void
    {
        $this->sendNotification($event);
    }

    public function statusDocumentPending(): void
    {
        // Stay to implements
    }

    public function statusDocumentRejected(): void
    {
        // Stay to implements
    }

    public function statusGeneralApprovalApproved(): void
    {
        // Stay to implements
    }

    public function statusGeneralApprovalAwaitingApproval(): void
    {
        // Stay to implements
    }

    public function statusGeneralApprovalPending(): void
    {
        // Stay to implements
    }

    public function statusGeneralApprovalRejected(): void
    {
        // Stay to implements
    }

    private function sendNotification(AccountWebhookDTO $event): void
    {
        $recipients = User::where('is_admin', true)->get();
        Notification::make()
            ->title('Evento Asaas: Documento em Análise')
            ->body("Seu documento está em análise. Assim que aprovado, você receberá uma notificação. <br>
                    General: {$event->account->general} <br>
                    Documentation: {$event->account->documentation} <br>
                    ComercialInfo: {$event->account->commercialInfo} <br>
                    BankAccountInfo: {$event->account->bankAccountInfo}
            ")
            ->success()
            ->sendToDatabase($recipients);

    }

}
