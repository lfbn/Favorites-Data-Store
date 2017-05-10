<?php

namespace FDS;

use FDS\Model\BaseFavoriteModel;
use FDS\Database;

class FavoritesDataStore {

    private $database;

    private $data;
    
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function set(BaseFavoriteModel $favorite) 
    {
        $this->data[$favorite->ownerId][] = $favorite;
        $this->database->insert((array)$favorite);
    }

    public function get($ownerId)
    {
        if (isset($this->data[$ownerId])) {
            return $this->data[$ownerId];
        }

        $cursor = $this->database->find(array("ownerId" => $ownerId));

        $instances = null;
        foreach ($cursor as $document) {
            $this->data[$ownerId] = $document["data"];
            $class = '\FDS\model\Favorite' . ucwords(strtolower($document["type"])) . 'Model';
            $instances[] = new $class(
                $ownerId,
                $document["data"]
            );
        }
        
        return $instances ? $instances : false;
    }

    public function remove($ownerId)
    {
        unset($this->data[$ownerId]);
        $this->database->remove(array("ownerId" => $ownerId));
    }
}