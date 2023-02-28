<?php

namespace App\Modules\Core\Traits;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

trait ActionService
{
    public function save(): Model
    {
        $this->validModel();
        $this->model->save();
        return $this->model->refresh();
    }

    public function update(): Model
    {
        $this->validModel();
        $this->model->update();
        return $this->model->refresh();
    }

    public function delete(): bool
    {
        $this->validModel();
        return $this->model->delete();
    }

    public function forceDelete(): bool
    {
        $this->validModel();
        return $this->model->forceDelete();
    }

    public function validModel(): void
    {
        if (false === ($this->model instanceof Model)) {
            throw new Exception('Model is not valid', ResponseAlias::HTTP_BAD_REQUEST);
        }
    }
}
