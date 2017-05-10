<?php

namespace FDS\helper;

class DataValidationHelper {

    public static function validatePositiveInteger($int)
    {
        if(!is_int($int) || $int < 1) {
            return false;
        }
        return true;
    }

    public static function validateUrl($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            return false;
        }
        return true;
    }
}