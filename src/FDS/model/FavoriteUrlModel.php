<?php

namespace FDS\model;

use FDS\helper\DataValidationHelper as DataValidationHelper;

class FavoriteUrlModel extends BaseFavoriteModel {

    public $type = 'URL';

    public function __construct($ownerId, $url)
    {        
        $this->validatePositiveInteger($ownerId);
        $this->validateUrl($url);
        $this->ownerId = $ownerId;
        $this->data = $url;
    }

    protected function validateUrl($url)
    {
        if(!DataValidationHelper::validateUrl($url)) {
            throw new \InvalidArgumentException(
                'Valid URL expected'
            );
        }
    }
}