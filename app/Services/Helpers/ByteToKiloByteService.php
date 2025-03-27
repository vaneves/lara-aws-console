<?php 

namespace App\Services\Helpers;

class ByteToKiloByteService
{
    public function execute(int $bytes): int
    {
        if ($bytes == 0) {
            return $bytes;
        }
        
        return $bytes / 1024;
    }
}