<?php

namespace App\Services;

use Illuminate\Http\RedirectResponse;

class RedirectToUserArea
{
    public static function redirect():RedirectResponse {
        return redirect()->route('user-area');
    }
}
