<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse {

    /**
     * 
     * @param type $data
     * @param string $message
     * @param int $statusCode
     * @return JsonResponse
     */
    protected function successResponse($data = null, string $message = 'Success', int $statusCode = 200): JsonResponse {
        return response()->json([
                    'success' => true,
                    'message' => $message,
                    'data' => $data,
                    'timestamp' => now()->toDateTimeString(),
                        ], $statusCode);
    }

    /**
     * 
     * @param string $message
     * @param int $statusCode
     * @param array $errors
     * @return JsonResponse
     */
    protected function errorResponse(string $message = 'Error', int $statusCode = 400, array $errors = []): JsonResponse {
        $response = [
            'success' => false,
            'message' => $message,
            'timestamp' => now()->toDateTimeString(),
        ];

        if (!empty($errors)) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $statusCode);
    }

    /**
     * 
     * @param type $data
     * @param string $message
     * @return JsonResponse
     */
    protected function paginatedResponse($data, string $message = 'Data retrieved successfully'): JsonResponse {
        return response()->json([
                    'success' => true,
                    'message' => $message,
                    'data' => $data->items(),
                    'pagination' => [
                        'current_page' => $data->currentPage(),
                        'per_page' => $data->perPage(),
                        'total' => $data->total(),
                        'last_page' => $data->lastPage(),
                        'from' => $data->firstItem(),
                        'to' => $data->lastItem(),
                    ],
                    'timestamp' => now()->toDateTimeString(),
        ]);
    }

}
