<?php

namespace App\Services;

use Illuminate\Http\RedirectResponse;

class RedirectToLogin
{
    public static function redirect():RedirectResponse {
        return redirect()->route('login');
    }
}
