<?php

namespace SistemAtc\Asaas\Tests\Unit\Traits;

use Illuminate\Support\Facades\Cache;
use SistemAtc\Asaas\Tests\TestCase;
use SistemAtc\Asaas\Traits\HandlesIdempotency;

class HandlesIdempotencyTest extends TestCase
{
    public function test_returns_false_for_first_event_processing(): void
    {
        $handler = $this->makeHandler();

        expect($handler->check('event_123'))->toBeFalse();
    }

    public function test_returns_true_when_event_was_already_processed(): void
    {
        $handler = $this->makeHandler();

        $handler->check('event_123');

        expect($handler->check('event_123'))->toBeTrue();
    }

    public function test_ttl_never_returns_value_lower_than_one_second(): void
    {
        config(['asaas.idempotency_ttl' => 0]);
        Cache::flush();

        $handler = $this->makeHandler();

        expect($handler->ttl())->toBe(1);
    }

    private function makeHandler(): object
    {
        return new class {
            use HandlesIdempotency;

            public function check(string $eventId): bool
            {
                return $this->wasAlreadyProcessed($eventId);
            }

            public function ttl(): int
            {
                return $this->resolveIdempotencyTtl();
            }
        };
    }
}
