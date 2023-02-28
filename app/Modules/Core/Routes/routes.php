<?php

declare(strict_types=1);

use App\Modules\Core\Http\Controllers\AuthController;
use App\Modules\Core\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 *  Authentications
 */
Route::post('/login', [AuthController::class, 'login'])->withoutMiddleware('auth:sanctum');

/**
 *  Users
 */
Route::get('/users', [UserController::class, 'index']);
