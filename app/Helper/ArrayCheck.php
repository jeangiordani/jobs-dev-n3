<?php

namespace App\Helper;

class ArrayCheck
{
    public function in_multiarray($elem, $array, $field)
    {
        $top = sizeof($array) - 1;
        $bottom = 0;
        while ($bottom <= $top) {
            if ($array[$bottom][$field] == $elem) {
                return true;
            } else {
                if (is_array($array[$bottom][$field])) {
                    if ($this->in_multiarray($elem, ($array[$bottom][$field]), null)) {
                        return true;
                    }
                }
            }
            $bottom++;
        }
        return false;
    }
}
