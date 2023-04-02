<?php

namespace App\Services;

class UniqueDirectoryMaker
{
    protected HashGenerator $hashGenerator;
    protected int $directoryLength;
    protected int $maxTry;
    public function __construct(
        HashGenerator $hashGenerator , int $directoryLength = 8 , int $maxTry = 5
    )
    {
        $this->directoryLength = $directoryLength;
        $this->hashGenerator = $hashGenerator;
        $this->maxTry = $maxTry;
    }

    public function make(string $destination):string {
        $counter = 0 ;
        do{
            $hash = $this->getHashGenerator()->generate256();
            $hash = substr($hash,0,$this->directoryLength);
            $fullDestination = $destination.$hash;
            $isExist = file_exists($fullDestination);
            $counter++;
            if ($counter==$this->maxTry)
                throw new \Exception("try $counter time for create unique directory but directories is exist !!! ");
        }while($isExist);
        mkdir($fullDestination);
        return $hash;
    }

    /**
     * @return HashGenerator
     */
    public function getHashGenerator(): HashGenerator
    {
        return $this->hashGenerator;
    }
    /**
     * @param HashGenerator $hashGenerator
     */
    public function setHashGenerator(HashGenerator $hashGenerator): void
    {
        $this->hashGenerator = $hashGenerator;
    }
}
