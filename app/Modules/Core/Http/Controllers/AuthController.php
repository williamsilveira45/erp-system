<?php

declare(strict_types=1);

namespace App\Modules\Core\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Core\Actions\Authentication\LoginAction;
use App\Modules\Core\Data\Authentication\LoginRequest;
use App\Modules\Core\Data\Authentication\LoginResponse;
use App\Modules\Core\Data\User\UserDTO;
use OpenApi\Attributes as OA;

class AuthController extends Controller
{
    #[OA\Post(
        path: '/api/login',
        summary: 'Login Request',
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(ref: '#components/schemas/LoginRequest')
        ),
        tags: ['Core/Authentication'],
        responses: [
            new OA\Response(
                response: 200,
                description: 'OK',
                content: new OA\JsonContent(
                    ref: '#/components/schemas/LoginResponse'
                )
            ),
            new OA\Response(
                response: 422,
                description: 'Invalid Input'
            ),
            new OA\Response(
                response: 401,
                description: 'Unauthorized'
            ),
        ]
    )]

    public function login(LoginRequest $request, LoginAction $loginAction): LoginResponse
    {
        return (new LoginResponse(UserDTO::from($loginAction->execute($request))));
    }
}
