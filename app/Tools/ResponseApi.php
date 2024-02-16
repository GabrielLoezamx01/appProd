<?php

namespace App\Tools;

class ResponseAPI
{
    public static function success (array $data , string $message = '')
    {
        return [
            'success' => true,
            'data'    => $data,
            'message' => $message
        ];
    }
    public static function error(string $message, int $code = 500)
    {
        return [
            'success' => false,
            'error'   => [
                'code'    => $code,
                'message' => $message,
            ],
        ];
    }
}
