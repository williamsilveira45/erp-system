<?php

namespace App\Modules\Core\Exceptions;

use Exception;

class ApiException extends Exception
{
    public function render($a, $b)
    {
        dd($a, $b);
    }
}
