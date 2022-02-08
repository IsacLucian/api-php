<?php

class Util
{
    public static function formatByType($value)
    {
        switch (gettype($value)) {
            case 'string':
                return "'" . $value . "'";
            case 'integer':
                return $value;
            case 'double':
                return $value;
            case 'float':
                return $value;
            default:
                return $value;
        }
    }
}
