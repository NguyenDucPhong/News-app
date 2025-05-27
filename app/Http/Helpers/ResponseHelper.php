<?php
namespace App\Http\Helpers;

use Illuminate\Http\JsonResponse;

class ResponseHelper
{
    /**
     *
     *
     * @param mixed $data
     * @param int $errorCode
     * @param string $message
     * @param int $statusCode
     * @return JsonResponse
     */
    public static function response($data = null, int $errorCode = 0, string $message = 'Success', int $statusCode = 200): JsonResponse
    {
        return response()->json([
            'error_code' => $errorCode,
            'message'    => $message,
            'data'       => $data
        ], $statusCode);
    }

    /**
     * Response success
     *
     * @param mixed $data
     * @param string $message
     * @param int $statusCode
     * @return JsonResponse
     */
    public static function success($data = null, string $message = 'Success', int $statusCode = 200): JsonResponse
    {
        return self::response($data, 0, $message, $statusCode);
    }

    /**
     * Response bad request
     *
     * @param string $message
     * @param int $errorCode
     * @param int $statusCode
     * @return JsonResponse
     */
    public static function BadRequest(string $message = 'Error', int $errorCode = 1, int $statusCode = 400): JsonResponse
    {
        return self::response(null, $errorCode, $message, $statusCode);
    }

    /**
     * Response Not Found
     *
     * @param string $message
     * @return JsonResponse
     */
    public static function notFound(string $message = 'Not Found'): JsonResponse
    {
        return self::error($message, 404, 404);
    }

    /**
     * Response Error Processing
     *
     * @param string $message
     * @return JsonResponse
     */
    public static function serverError(string $message = 'Server Error'): JsonResponse
    {
        return self::error($message, 500, 500);
    }

    /**
     * Response unauthorized
     *
     * @param string $message
     * @return JsonResponse
     */
    public static function unauthorized(string $message = 'Unauthorized'): JsonResponse
    {
        return self::error($message, 401, 401);
    }
}
