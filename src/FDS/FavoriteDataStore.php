<?php

namespace FDS;

use FDS\Model\BaseFavoriteModel;

class FavoritesDataStore {

    /**
     * @var Database
     */
    private $database;

    /**
     * @var array
     */
    private $data;

    /**
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    /**
     * @param BaseFavoriteModel $favorite
     */
    public function set(BaseFavoriteModel $favorite)
    {
        $this->data[$favorite->ownerId][] = $favorite;
        $this->database->insert((array)$favorite);
    }

    /**
     * @param int $ownerId
     * @return BaseFavoriteModel[]
     */
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

    /**
     * @param int $ownerId
     * @return boolean
     */
    public function remove($ownerId)
    {
        unset($this->data[$ownerId]);
        $this->database->remove(array("ownerId" => $ownerId));
        return true;
    }
}