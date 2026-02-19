<?php

namespace SistemAtc\Asaas\Traits;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

trait HandlesIdempotency
{
    /**
     * @param string $eventId O ID único do evento
     */
    protected function wasAlreadyProcessed(string $eventId): bool
    {
        $cacheKey = "asaas:webhook:processed:{$eventId}";
        $ttl = $this->resolveIdempotencyTtl();

        $isNew = Cache::add($cacheKey, true, $ttl);

        if (!$isNew) {
            Log::info("Asaas Webhook: Event {$eventId} ignored (Idempotency triggered).");
            return true;
        }
        
        return false;
    }

    protected function resolveIdempotencyTtl(): int
    {
        $ttl = (int) config('asaas.idempotency_ttl', 86400);

        return max(1, $ttl);
    }
}
