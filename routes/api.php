<?php

use Illuminate\Support\Facades\Route;
use SistemAtc\Asaas\Http\Controllers\AsaasEventsController;
use SistemAtc\Asaas\Http\Middleware\AsaasTokenValid;

Route::prefix('api')->middleware(['api', AsaasTokenValid::class])->group(function () {
    Route::post('/asaas-events', [AsaasEventsController::class, 'payload'])->name('asaas.webhook');
});