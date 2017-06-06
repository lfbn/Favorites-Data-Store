<?php

namespace FDS\helper;

class DataValidationHelper {

    /**
     * Checks if the value is a positive integer
     *
     * @param int $value
     *
     * @return boolean
     */
    public static function validatePositiveInteger($value)
    {
        if(!is_int($value) || $value < 1) {
            return false;
        }
        return true;
    }

    /**
     * Checks if the value is a valid URL
     *
     * @param string $value
     *
     * @return boolean
     *
     * @link http://php.net/manual/en/filter.filters.validate.php
     */
    public static function validateUrl($value)
    {
        if (filter_var($value, FILTER_VALIDATE_URL) === false) {
            return false;
        }
        return true;
    }
}