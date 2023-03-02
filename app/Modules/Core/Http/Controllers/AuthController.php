<?php

declare(strict_types=1);

namespace App\Modules\Core\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Core\Actions\Authentication\CreateApiTokenAction;
use App\Modules\Core\Actions\Authentication\LoginAction;
use App\Modules\Core\Data\Authentication\CreateApiTokenResponse;
use App\Modules\Core\Data\Authentication\LoginRequest;
use App\Modules\Core\Data\Authentication\LoginResponse;
use App\Modules\Core\Data\User\UserDTO;
use Illuminate\Support\Facades\Auth;
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
                response: 201,
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
            new OA\Response(
                response: 419,
                description: 'CSRF token mismatch'
            ),
        ]
    )]
    public function login(LoginRequest $request, LoginAction $loginAction): LoginResponse
    {
        return (new LoginResponse(UserDTO::from($loginAction->execute($request))));
    }

    #[OA\Post(
        path: '/api/tokens/create',
        summary: 'Create Api Request',
        security: [
            [
                'sanctum' => [],
            ]
        ],
        tags: ['Core/Authentication'],
        responses: [
            new OA\Response(
                response: 201,
                description: 'OK',
                content: new OA\JsonContent(
                    ref: '#/components/schemas/CreateTokenResponse'
                )
            ),
            new OA\Response(
                response: 401,
                description: 'Unauthorized'
            ),
            new OA\Response(
                response: 419,
                description: 'CSRF token mismatch'
            ),
        ]
    )]
    public function createToken(CreateApiTokenAction $createApiTokenAction): CreateApiTokenResponse
    {
        /** @var User $user */
        $user = Auth::user();
        return new CreateApiTokenResponse($createApiTokenAction->useModel($user)->execute());
    }
}
