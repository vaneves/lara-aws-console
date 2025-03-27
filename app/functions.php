<?php

if (! function_exists('byte_to_kilobyte')) {
    function byte_to_kilobyte(int $bytes) {
        if ($bytes == 0) {
            return 0;
        }

        return $bytes / 1024;
    }
}

if (! function_exists('byte_to_kb')) {
    function byte_to_kb(int $bytes) {
        $kilobytes = byte_to_kilobyte($bytes);

        return number_format($kilobytes, 0) . ' KB';
    }
}

if (! function_exists('bool_in_array')) {
    function bool_in_array(array $array, mixed $key, bool $default = false) {
        if (! isset($array[$key])) {
            return $default;
        }

        return filter_var($array[$key], FILTER_VALIDATE_BOOLEAN);
    }
}