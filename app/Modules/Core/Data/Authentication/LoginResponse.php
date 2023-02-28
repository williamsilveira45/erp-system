<?php

declare(strict_types=1);

namespace App\Modules\Core\Data\Authentication;

use App\Modules\Core\Data\User\UserDTO;
use Spatie\LaravelData\Data;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'LoginResponse',
    description: 'Login Response',
    properties: [
        new OA\Property(
            property: 'user',
            ref: '#/components/schemas/UserDTO',
            description: 'User',
        ),
    ],
    type: 'object'
)]
class LoginResponse extends Data {
    public function __construct(
        public readonly UserDTO $user,
    ) {}
}
