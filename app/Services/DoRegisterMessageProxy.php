<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;

class DoRegisterMessageProxy
{
    public function get($created , string $userFirstName):array {
        if ($created instanceof Model)
            return [
                'key' =>'system.messages.ok' ,
                'value' =>  "dear $userFirstName your successfully registered to system !!!" ,
            ];
        return [
            'key' =>'system.messages.fail' ,
            'value' => "dear $userFirstName you cant register to system try after please !!! "
        ];
    }
}
