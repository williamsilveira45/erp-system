<?php

declare(strict_types=1);

namespace App\Modules\Core\Data\Authentication;

use App\Modules\Core\Data\User\UserDTO;
use Spatie\LaravelData\Data;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'CreateTokenResponse',
    description: 'This is the response for the create token request',
    properties: [
        new OA\Property(
            property: 'token',
            type: 'string',
        ),
    ],
    type: 'object'
)]
class CreateApiTokenResponse extends Data {
    public function __construct(
        public readonly string $token,
    ) {}
}
