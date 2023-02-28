<?php

namespace App\Modules\Core\Models;

use App\Modules\Core\Traits\Uuid;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use Uuid;

    public $incrementing = false;
}
