<?php

use Illuminate\Support\Facades\Route;
use SistemAtc\Asaas\Http\Controllers\AsaasEventsController;
use SistemAtc\Asaas\Http\Middleware\AsaasTokenValid;

Route::prefix('api')->middleware(['api', AsaasTokenValid::class])
    ->group(function () {
        Route::post(
            config('asaas.route_events.path'),
            [AsaasEventsController::class, 'payload']
        )
        ->name(config('asaas.route_events.route_name')
    );
});