<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\ContactControllerAPI;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;


// Users
Route::middleware([EnsureFrontendRequestsAreStateful::class])->group(function () {
    Route::get('/users', [ApiController::class, 'getUsers']);
    Route::post('/users', [ApiController::class, 'createUser']);
    Route::get('/users/{id}', [ApiController::class, 'getUser']);
    Route::put('/users/{id}', [ApiController::class, 'updateUser']);
    Route::delete('/users/{id}', [ApiController::class, 'deleteUser']);
});

// Contacts
Route::middleware([EnsureFrontendRequestsAreStateful::class])->group(function () {
  Route::get('/contacts', [ContactControllerAPI::class, 'getContacts']);
  Route::post('/contacts', [ContactControllerAPI::class, 'storeContact']);
  Route::put('/contacts/{id}', [ContactControllerAPI::class, 'updateContact']);
  Route::delete('/contacts/{id}', [ContactControllerAPI::class, 'deleteContact']);
});