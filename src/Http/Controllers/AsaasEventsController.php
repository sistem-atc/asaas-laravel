<?php

namespace SistemAtc\Asaas\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use SistemAtc\Asaas\Jobs\ProcessAsaasWebhook;

class AsaasEventsController extends Controller
{
    /**
     * Maximum payload size in bytes (1MB)
     */
    private const MAX_PAYLOAD_SIZE = 1048576;

    public function payload(Request $request)
    {
        $payload = $request->all();
        
        // Validate payload size
        $payloadSize = strlen(json_encode($payload));
        if ($payloadSize > self::MAX_PAYLOAD_SIZE) {
            Log::warning('Asaas Webhook: Payload size exceeds maximum allowed', [
                'size' => $payloadSize,
                'max_size' => self::MAX_PAYLOAD_SIZE,
            ]);
            return response()->json(['message' => 'Payload too large'], 413);
        }

        // Validate that payload is not empty
        if (empty($payload)) {
            Log::warning('Asaas Webhook: Empty payload received');
            return response()->json(['message' => 'Empty payload'], 400);
        }

        ProcessAsaasWebhook::dispatch($payload);
        return response()->noContent(204);
    }
}
