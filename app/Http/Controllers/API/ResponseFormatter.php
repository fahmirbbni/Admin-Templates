<?php

namespace App\Http\Controllers\API;

// membuat class yang bisa dipanggil di semua namespace API
// ketika panggil data returnnya bukan view tapi response formatter
class ResponseFormatter
{
    //
    protected static $response = [
        'meta' => [
            'code' => '200',
            'status' => 'success',
            'message' => null
        ],
        'data' => null
    ];

    public static function success($data = null, $message = null)
    {
        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['meta']['code']);
    }

    public static function error($data = null, $message = null, $code = 400)
    {
        self::$response['meta']['status'] = 'error';
        self::$response['meta']['code'] = $code;
        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['meta']['code']);   
    }

}