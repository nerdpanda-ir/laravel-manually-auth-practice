<?php

namespace App\Services;

class HashGenerator
{
    public function generate256():string {

        $microTime = microtime();
        $result = [];
        $result['md2'] = hash('md2',$microTime);
        $result['md4'] = hash('md4',$microTime);
        $result['md5'] = md5($microTime);
        $result['sha1'] =sha1($microTime);
        $result['sha256'] = hash('sha256',$microTime);
        $result['ripemd128'] = hash('ripemd128',$microTime);
        $result['adler32'] = hash('adler32',$microTime);
        $result['crc32'] = hash('crc32',$microTime);
        $result['crc32b'] = hash('crc32',$microTime);
        return implode('',$result);
    }
}
