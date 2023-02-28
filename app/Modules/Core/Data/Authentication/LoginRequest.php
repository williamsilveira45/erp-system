<?php

declare(strict_types=1);

namespace App\Modules\Core\Data\Authentication;

use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use OpenApi\Attributes as OA;


#[OA\Schema(
    schema: 'LoginRequest',
    description: 'Request Parameters',
    properties: [
        new OA\Property(
            property: 'email',
            description: 'Email',
            type: 'string',
            format: 'email',
        ),
        new OA\Property(
            property: 'password',
            description: 'Password',
            type: 'string',
        ),
    ],
    type: 'object'
)]
class LoginRequest extends Data
{
    public function __construct(
        #[Required, Email, Exists('users', 'email')]
        public string $email,
        public string $password,
    ) {
    }
}
