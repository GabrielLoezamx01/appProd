<?php

namespace App\Tools;

use Illuminate\Support\Facades\Http;

class Recaptcha
{

    public static function captcha(string $value) : bool
    {
        $response = Http::withoutVerifying()->asForm()->post(env('API_GOOGLE_CAPTCHA'), [
            'secret'   => env('CAPTCHA_SECRET_KEY'),
            'response' => $value
        ])->object();
        if ($response->success && $response->score > 0.7) {
            return true;
        }
        return false;
    }

}
