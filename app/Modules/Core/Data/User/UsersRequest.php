<?php

declare(strict_types=1);

namespace App\Modules\Core\Data\User;

use Illuminate\Http\Request;
use Spatie\LaravelData\Data;


class UsersRequest extends Data
{
    public function __construct(
        public ?int $perPage = 100,
        public ?int $page = 1,
    ) {
    }

    public function fromRequest(Request $request): self
    {
        return new self(
            $request->get('per_page'),
            $request->get('page'),
        );
    }
}
