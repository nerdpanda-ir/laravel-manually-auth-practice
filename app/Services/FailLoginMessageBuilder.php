<?php

namespace App\Services;

class FailLoginMessageBuilder
{
    public static function get():array {
        return [
            'key'=>'system.messages.fail' ,
            'value' => ["userName or password Wrong !!!"]
        ];
    }
}
