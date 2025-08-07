<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler {

    /**
     * 
     * @var type
     */
    protected $dontReport = [
            //
    ];

    /**
     * 
     * @var type
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register() {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e) {
        // Handle API requests
        if ($request->expectsJson()) {
            return $this->handleApiException($request, $e);
        }

        return parent::render($request, $e);
    }

    private function handleApiException($request, Throwable $e) {
        if ($e instanceof ModelNotFoundException) {
            return response()->json($this->responseObj('Resource not found'), 404);
        }

        if ($e instanceof ValidationException) {
            return response()->json($this->responseObj('Validation failed'), 422);
        }

        if ($e instanceof NotFoundHttpException) {

            return response()->json($this->responseObj('Endpoint not found'), 404);
        }

        // For other exceptions in production
        if (!config('app.debug')) {
            return response()->json($this->responseObj('Something went wrong'), 500);
        }

        return parent::render($request, $e);
    }

    private function responseObj($message, $success = false, $code = 400) {
        return [
            'code' => $code,
            'success' => $success,
            'message' => $message,
        ];
    }

}
