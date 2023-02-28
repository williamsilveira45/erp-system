<?php

namespace App\Exceptions;

use App\Modules\Core\Exceptions\ApiException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use ReflectionClass;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if (
            $exception instanceof ApiException ||
            $exception instanceof ModelNotFoundException
        ) {
            $code = $exception->getCode();
            $message = $exception->getMessage();
            if ($exception instanceof ModelNotFoundException) {
                $code = Response::HTTP_NOT_FOUND;
                $message = (new ReflectionClass($exception->getModel()))->getShortName() . ' not found';
            }

            $json = [
                'success' => false,
                'code' => $code,
                'message' => $message,
                'error' => [
                    'code' => $code,
                    'message' => $message,
                ],
            ];

            \Log::error($exception->getMessage());
            \Log::error($exception->getTraceAsString());

            return response()->json($json, $code);
        }

        return parent::render($request, $exception);
    }
}
