<?php

namespace App\Providers;

use ReCaptcha\ReCaptcha;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class RecaptchaValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        Validator::extend('captcha', function ($attribute, $value, $parameters, $validator) {
            $ip = request()->getClientIp();
            $secret = config('services.google_recaptcha.secret_key');
            $recaptcha = new ReCaptcha($secret);
            $resp = $recaptcha->verify($value, $ip);
            return $resp->isSuccess();
        });
    }
}