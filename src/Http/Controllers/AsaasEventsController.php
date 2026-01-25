<?php

namespace SistemAtc\Asaas\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use SistemAtc\Asaas\Events\WebhookReceived;

class AsaasEventsController extends Controller
{
    public function payload(Request $request)
    {
        event(new WebhookReceived(
            $request->all(), 
            $request->header('asaas-access-token')
        ));

        return response()->noContent(204);
    }
}