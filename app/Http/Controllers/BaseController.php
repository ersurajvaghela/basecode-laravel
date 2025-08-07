<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class BaseController extends Controller {

    protected function successResponse($data = null, string $message = 'Success', int $statusCode = 200): JsonResponse {
        return response()->json([
                    'success' => true,
                    'message' => $message,
                    'data' => $data,
                        ], $statusCode);
    }

    protected function errorResponse(string $message = 'Error', int $statusCode = 400, array $errors = []): JsonResponse {
        $response = [
            'success' => false,
            'message' => $message,
        ];

        if (!empty($errors)) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $statusCode);
    }

    protected function validationErrorResponse($validator): JsonResponse {
        return $this->errorResponse(
                        'Validation failed',
                        422,
                        $validator->errors()->toArray()
        );
    }

}
