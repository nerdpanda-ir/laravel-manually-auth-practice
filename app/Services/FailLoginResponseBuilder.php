<?php

namespace App\Services;

use Illuminate\Http\RedirectResponse;

class FailLoginResponseBuilder
{
    public static  function build(array $inputs = []):RedirectResponse {
        $failMessage = FailLoginMessageBuilder::get();

        return redirect()->route('login')
            ->with(
                $failMessage['key'],$failMessage['value']
            )
            ->withInput($inputs);
    }
}
