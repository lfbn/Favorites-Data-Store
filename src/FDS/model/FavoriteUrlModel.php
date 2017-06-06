<?php

namespace FDS\model;

use FDS\helper\DataValidationHelper as DataValidationHelper;

class FavoriteUrlModel extends BaseFavoriteModel {

    /**
     * @var string
     */
    public $type = 'URL';

    /**
     * @param int $ownerId
     * @param string $url
     */
    public function __construct($ownerId, $url)
    {
        $this->validatePositiveInteger($ownerId);
        $this->validateUrl($url);
        $this->ownerId = $ownerId;
        $this->data = $url;
    }

    /**
     * @param string $url
     * @return boolean
     */
    protected function validateUrl($url)
    {
        if(!DataValidationHelper::validateUrl($url)) {
            throw new \InvalidArgumentException(
                'Valid URL expected'
            );
        }
        return true;
    }
}