<?php

namespace SistemAtc\Asaas\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use SistemAtc\Asaas\Jobs\ProcessAsaasWebhook;

class AsaasEventsController extends Controller
{
    public function payload(Request $request)
    {
        ProcessAsaasWebhook::dispatch($request->all());
        return response()->noContent(204);
    }
}
