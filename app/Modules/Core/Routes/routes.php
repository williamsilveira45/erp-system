<?php

declare(strict_types=1);

use App\Modules\Core\Http\Controllers\AuthController;
use App\Modules\Core\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/**
 *  Authentications
 */
Route::post('/login', [AuthController::class, 'login'])->withoutMiddleware('auth:sanctum');
Route::post('/tokens/create', [AuthController::class, 'createToken']);

/**
 *  Users
 */
Route::get('/users', [UserController::class, 'index']);
