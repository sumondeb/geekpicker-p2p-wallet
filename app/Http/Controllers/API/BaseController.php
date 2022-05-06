<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BaseController extends Controller
{
    /**
     * success response method.
     */
    public function successResponse(string $message, $result = []): JsonResponse
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }

    /**
     * return error response.
     */
    public function errorResponse(string $error, $errorMessages = [], int $code = 404): JsonResponse
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }

    /**
     * return error response for validation.
     */
    public function validationError($errorMessages = []): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => 'Validation Error',
            'data' => $errorMessages,
        ];

        return response()->json($response, 422);
    }
}
