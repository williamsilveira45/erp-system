<?php

declare(strict_types=1);

namespace App\Modules\Core\Actions\Authentication;

use App\Models\User;
use App\Modules\Core\Traits\ActionBase;

/**
 * Class CreateApiTokenAction
 *
 * @property User $model
 */
class CreateApiTokenAction extends ActionBase
{
    public function handle(): string
    {
        $token = $this->model->createToken('api-token');
        return $token->plainTextToken;
    }
}
