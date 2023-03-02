<?php

namespace App\Modules\Core\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Core\Data\User\UserDTO;
use App\Modules\Core\Data\User\UsersRequest;
use App\Modules\Core\Interfaces\UserRepositoryInterface;
use OpenApi\Attributes as OA;

class UserController extends Controller
{
    #[OA\Get(
        path: '/api/users',
        summary: 'Users Request',
        security: [
            [
                'sanctum' => [],
            ]
        ],
        tags: ['Core/Users'],
        parameters: [
            new OA\Parameter(
                name: 'per_page',
                description: 'Number of items per page',
                in: 'query',
                required: false,
                schema: new OA\Schema(type: 'integer')
            ),
            new OA\Parameter(
                name: 'page',
                description: 'Page number',
                in: 'query',
                required: false,
                schema: new OA\Schema(type: 'integer')
            ),
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'OK',
                content: new OA\JsonContent(
                    ref: '#/components/schemas/UserDTO'
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
                description: 'CSRF token mismatch.'
            ),
        ]
    )]
    /** @todo fix the return method */
    public function index(UsersRequest $request, UserRepositoryInterface $repository): UserDTO
    {
        return UserDTO::collection($repository->getAll($request->perPage, $request->page));
    }
}
