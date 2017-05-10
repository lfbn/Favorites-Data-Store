<?php

namespace FDS\model;

use FDS\helper\DataValidationHelper as DataValidationHelper;

abstract class BaseFavoriteModel {
    
    public $ownerId;

    public $data;

    public $type;

    protected function validatePositiveInteger($int)
    {
        if(!DataValidationHelper::validatePositiveInteger($int)) {
            throw new \InvalidArgumentException(
                'Positive integer value expected'
            );
        }
    }
}