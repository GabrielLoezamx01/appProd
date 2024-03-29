<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class Recaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $response = Http::withoutVerifying()->asForm()->post(env('API_GOOGLE_CAPTCHA'), [
            'secret'   => env('CAPTCHA_SECRET_KEY'),
            'response' => $value
        ])->object();
        if (!($response->success && $response->score > 0.7)) {
            $fail('el captcha no es válido');
        }
    }
}
