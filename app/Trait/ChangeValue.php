<?php

namespace App\Trait;

trait ChangeValue
{
    static function Change($value)
    {
        if ($value == 'on' || $value == 'yes') {
            $value = 1;
        } else {
            $value = 0;
        }
        return $value;
    }
}
