<?php

declare(strict_types=1);

namespace App\Modules\Core\Providers;

use App\Modules\Core\Interfaces\UserRepositoryInterface;
use App\Modules\Core\Repositories\UserRepository;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
    }

    public function provides(): array
    {
        return [UserRepositoryInterface::class];
    }

}
