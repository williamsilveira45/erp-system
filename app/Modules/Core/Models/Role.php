<?php

namespace App\Modules\Core\Models;

use App\Modules\Core\Traits\Uuid;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use Uuid;

    public $incrementing = false;
}
