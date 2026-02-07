<?php

namespace SistemAtc\Asaas\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AsaasTokenValid
{
    public function handle(Request $request, Closure $next): Response
    {

        if (!config('asaas.use_webhook_security')) {
            return $next($request);
        }

        $receivedToken = trim((string) $request->header('asaas-access-token'));
        $expectedToken = (string) config('asaas.webhook_token');

        $isValid = $receivedToken !== '' && hash_equals($expectedToken, $receivedToken);

        if (! $isValid) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
