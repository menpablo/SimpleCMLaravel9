<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use stdClass;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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
        $this->renderable(function (ValidationException $e) {
            $error = new stdClass();
            $error->status_code = 422;
            $messages = $e->validator->messages()->messages();
            $error->message = $e->getMessage();
            $error->errors = [];
            foreach ($messages as $key => $value) {
                $error->errors[$key] = $value;
            }

            return response()->json((array) $error, 422);
        });

        $this->renderable(function (ModelNotFoundException $e, $request) {
            $error = new stdClass();
            $error->status_code = 404;
            $error->message = 'Sorry, the requested resource does not exist';
            return response()->json((array) $error, 404);
        });

        $this->renderable(function (Exception $e, $request) {
            if ($e instanceof NotFoundHttpException && substr($e->getMessage(), 0, 26) == 'No query results for model') {
                $error = new stdClass();
                $error->status_code = 404;
                $error->message = 'Sorry, the requested resource does not exist';
                return response()->json((array) $error, 404);
            }
        });

        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
