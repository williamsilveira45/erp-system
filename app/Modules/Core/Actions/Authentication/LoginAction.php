<?php

declare(strict_types=1);

namespace App\Modules\Core\Actions\Authentication;

use App\Models\User;
use App\Modules\Core\Exceptions\ApiException;
use App\Modules\Core\Interfaces\UserRepositoryInterface;
use App\Modules\Core\Traits\ActionBase;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Exception;

class LoginAction extends ActionBase
{
    public function __construct(
        public readonly UserRepositoryInterface $userRepository,
    ) {
    }

    public function handle(): User
    {
        $user = $this->userRepository->findByEmail($this->data->email);

        if (null === $user || false === Auth::attempt($this->data->toArray())) {
            throw new ApiException('Invalid credentials', ResponseAlias::HTTP_UNAUTHORIZED);
        }

        return $user;
    }
}
