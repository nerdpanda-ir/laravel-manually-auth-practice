<?php

namespace App\Services;

class UniqueDirectoryMakerFactory
{
    public function make(
        string $hashGenerator = HashGenerator::class ,
        int $directoryLength = 8 ,
        int $maxTry = 5 ,
    ):UniqueDirectoryMaker {
        $hashGenerator = new $hashGenerator;
        return new UniqueDirectoryMaker($hashGenerator , $directoryLength , $maxTry);
    }
}
