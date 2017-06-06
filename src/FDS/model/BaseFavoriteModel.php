<?php

namespace FDS\model;

use FDS\helper\DataValidationHelper as DataValidationHelper;

abstract class BaseFavoriteModel {

    /**
     * The owner ID of the favorite.
     *
     * @var int
     */
    public $ownerId;

    /**
     * The favorite. Who implements this abstract defines
     * the value saved here.
     *
     * @var mixed
     */
    public $data;

    /**
     * The type of the favorite. Who implements this abstract
     * must define this type.
     *
     * @var string
     */
    public $type = "default";

    /**
     * @param int $value
     * @throws \InvalidArgumentException if the provided argument is not a
     * positive integer.
     * @return boolean
     */
    protected function validatePositiveInteger($value)
    {
        if(!DataValidationHelper::validatePositiveInteger($value)) {
            throw new \InvalidArgumentException(
                'Positive integer value expected'
            );
        }
        return true;
    }
}