<?php

namespace App;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    public static function success(string $message, $data=null):JsonResponse
    {
        return response()->json([
            "message" => $message,
            "data" => $data
        ], 200);
    }
}
