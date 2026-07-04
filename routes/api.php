<?php

use App\Http\Controllers\Api\CatalogApiController;
use App\Http\Controllers\Api\HomeApiController;
use App\Http\Controllers\Api\JournalApiController;
use App\Http\Controllers\Api\OrderApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\ContactsApiController;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\SubscribeController;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;

Route::get('/settings', fn() => response()->json(Setting::allKeyed()));
Route::get('/home', [HomeApiController::class, 'index']);
Route::get('/catalog', [CatalogApiController::class, 'index']);
Route::get('/products/{slug}', [ProductApiController::class, 'show']);
Route::get('/journal', [JournalApiController::class, 'index']);
Route::get('/journal/{slug}', [JournalApiController::class, 'show']);
Route::get('/contacts', [ContactsApiController::class, 'index']);
Route::post('/orders', [OrderApiController::class, 'store']);
Route::post('/leads', [LeadController::class, 'store']);
Route::post('/subscribe', [SubscribeController::class, 'store']);
