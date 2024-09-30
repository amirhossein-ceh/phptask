<?php

use App\Http\Controllers\Api\SectionController;
use App\Http\Controllers\Api\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/subscriptions/purchase', [SubscriptionController::class, 'purchase']);
    Route::get('/subscriptions/{id}/invoice', [SubscriptionController::class, 'invoice']);
    Route::get('/sections', [SectionController::class, 'index']);
    Route::get('/sections/access', [SectionController::class, 'access']);
});
