<?php

namespace FDS;

use FDS\helper\MongoDbHelper;

class Database {

    /**
     * @var string
     */
    private $host;

    /**
     * @var int
     */
    private $port;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $database;

    /**
     * @var string
     */
    private $collection;

    /**
     * @param string $host
     * @param int $port
     * @param string $username
     * @param string $password
     * @param string $database
     * @param string $collection
     */
    public function __construct($host, $port, $username, $password, $database, $collection) {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        $this->collection = $this
            ->connect()
            ->selectCollection($database, $collection);
    }

    /**
     * @param array|object $data
     * @return bool|array
     */
    public function insert($data) {
        return $this->collection->insert($data);
    }

    /**
     * @param array $filter
     * @return \MongoCursor
     */
    public function find($filter) {
        return $this->collection->find($filter);
    }

    /**
     * @param $filter
     * @return array|bool
     */
    public function remove($filter) {
        return $this->collection->remove($filter);
    }

    /**
     * @return \MongoClient
     * @throws \Exception - If Mongo is not available
     */
    private function connect() {
        if (!class_exists('Mongo')) {
            throw new \Exception('The MongoDB PECL extension has not been installed or enabled');
        }

        try {
            $mongoClient = new \MongoClient(
                MongoDbHelper::buildConnectionString(
                    $this->host,
                    $this->port,
                    $this->database,
                    $this->username,
                    $this->password
                )
            );
        } catch (\Exception $e) {
            throw new \Exception('The Mongo Client was not correctly instantiated');
        }

        return $mongoClient;
    }
}