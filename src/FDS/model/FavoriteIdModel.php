<?php

namespace FDS\model;

class FavoriteIdModel extends BaseFavoriteModel {

    /**
     * @var string
     */
    public $type = 'ID';

    /**
     * @param int $ownerId
     * @param int $id
     */
    public function __construct($ownerId, $id)
    {
        $this->validatePositiveInteger($ownerId);
        $this->validatePositiveInteger($id);
        $this->ownerId = $ownerId;
        $this->data = $id;
    }
}