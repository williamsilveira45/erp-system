<?php

declare(strict_types=1);

namespace App\Modules\Core\Data\User;

use App\Models\User;
use Spatie\LaravelData\Attributes\Validation\Uuid;
use Spatie\LaravelData\Data;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'UserDTO',
    description: 'User DTO',
    properties: [
        new OA\Property(
            property: 'id',
            description: 'ID',
            type: 'string',
        ),
        new OA\Property(
            property: 'email',
            description: 'Email',
            type: 'string',
            format: 'email',
        ),
        new OA\Property(
            property: 'email_verified_at',
            description: 'Email Verified At',
            type: 'string',
            format: 'date-time',
        ),
        new OA\Property(
            property: 'created_at',
            description: 'Created At',
            type: 'string',
            format: 'date-time',
        ),
        new OA\Property(
            property: 'updated_at',
            description: 'Updated At',
            type: 'string',
            format: 'date-time',
        ),
        new OA\Property(
            property: 'deleted_at',
            description: 'Deleted At',
            type: 'string',
            format: 'date-time',
        ),
    ],
    type: 'object'
)]
class UserDTO extends Data
{
    public function __construct(
        #[Uuid]
        public readonly string $id,
        public readonly string $email,
        public readonly \DateTime $email_verified_at,
        public readonly \DateTime $created_at,
        public readonly \DateTime $updated_at,
        public readonly ?\DateTime $deleted_at,
    ) {
    }
}
