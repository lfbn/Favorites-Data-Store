<?php

namespace FDS\model;

class FavoriteIdModel extends BaseFavoriteModel {

    public $type = 'ID';
    
    public function __construct($ownerId, $id)
    {        
        $this->validatePositiveInteger($ownerId);
        $this->validatePositiveInteger($id);
        $this->ownerId = $ownerId;
        $this->data = $id;        
    }
}