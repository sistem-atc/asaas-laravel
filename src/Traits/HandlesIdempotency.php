<?php

namespace SistemAtc\Asaas\Traits;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

trait HandlesIdempotency
{
    /**
     * @param string $eventId O ID único do evento
     * @param int $ttl Tempo em segundos para manter o registro (padrão 24h)
     */
    protected function wasAlreadyProcessed(string $eventId): bool
    {
        $cacheKey = "asaas:webhook:processed:{$eventId}";
        $ttl = config('asaas.idempotency_ttl', 86400);

        $isNew = Cache::add($cacheKey, true, $ttl);

        if (!$isNew) {
            Log::info("Asaas Webhook: Event {$eventId} ignored (Idempotency triggered).");
            return true;
        }
        
        return false;
    }
}
