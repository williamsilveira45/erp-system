<?php

declare(strict_types=1);

namespace App\Modules\Core\Traits;

use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\Data;

abstract class ActionBase
{
    use ActionService;

    protected Data $data;

    protected Model $model;

    public function useModel(Model $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function execute(Data $data): mixed
    {
        $this->data = $data;

        return $this->handle();
    }
}
